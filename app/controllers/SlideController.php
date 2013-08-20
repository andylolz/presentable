<?php
use dflydev\markdown\MarkdownExtraParser;

class SlideController extends Controller {
  /**
   * Display the slide index.
   */
  public function index($presentation_slug)
  {
    $presentation = Presentation::get_by_slug($presentation_slug);
    return View::make('slide.index')
      ->with('presentation', $presentation);
  }

  /**
   * Save a new slide, and redirect to its edit view.
   */
  public function store($presentation_slug)
  {
    $presentation = Presentation::get_by_slug($presentation_slug);
    // get the final slide
    $final_slide = $presentation->slides()->orderBy('number', 'desc')->first();
    // figure out the new final slide number
    if(is_null($final_slide)) {
      $new_final_slide_num = 1;
    } else {
      $new_final_slide_num = $final_slide->number + 1;
    }
    // create a new final slide
    $new_final_slide = new Slide(array('number' => $new_final_slide_num));
    // add the new final slide to the presentation
    $presentation->slides()->save($new_final_slide);

    return Redirect::action('SlideController@edit', array($presentation_slug, $new_final_slide_num));
  }

  /**
   * Display the presentation (rendered) view of a slide.
   */
  public function show($presentation_slug, $number)
  {
    $presentation = Presentation::get_by_slug($presentation_slug);
    $slide = $presentation->slides()->where('number', $number)->first();

    // If we're trying to view a non-existent slide, go to the slide index
    if(is_null($slide)) {
      return Redirect::action('SlideController@index', array($presentation_slug));
    }

    // render the slide contents
    $md = new MarkdownExtraParser();
    $rendered_contents = $md->transformMarkdown($slide->contents);

    return View::make('slide.show')
      ->with('slide', $slide)
      ->with('presentation', $presentation)
      ->with('rendered_contents', $rendered_contents);
  }

  /**
   * Display the edit view of a slide.
   */
  public function edit($presentation_slug, $number)
  {
    $presentation = Presentation::get_by_slug($presentation_slug);
    $slide = $presentation->slides()->where('number', $number)->first();

    return View::make('slide.edit')
      ->with('slide', $slide);
  }

  /**
   * Update an existing slide, and redirect to its rendered view.
   */
  public function update($presentation_slug, $number)
  {
    $presentation = Presentation::get_by_slug($presentation_slug);
    $slide = $presentation->slides()->where('number', $number)->first();

    // Fetch the POSTed contents
    $slide->contents = Input::get('contents');
    // Save to the database
    $slide->save();

    return Redirect::action('SlideController@show', array($presentation_slug, $slide->number));
  }

  /**
   * Delete an existing slide, and redirect to the slide index.
   */
  public function destroy($presentation_slug, $number)
  {
    $presentation = Presentation::get_by_slug($presentation_slug);
    // delete the specified slide
    $presentation->slides()->where('number', $number)->delete();

    return Redirect::action('SlideController@index', array($presentation_slug));
  }
}
