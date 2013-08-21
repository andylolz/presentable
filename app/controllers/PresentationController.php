<?php

class PresentationController extends Controller {
  public function __construct()
  {
    $this->beforeFilter('csrf', array('on' => 'post'));
    $this->beforeFilter('auth', array('only' => array('create', 'store', 'destroy')));
  }

  /**
   * Display the presentation index.
   */
  public function index()
  {
    $presentations = Presentation::all();
    return View::make('presentation.index')
      ->with('presentations', $presentations);
  }

  /**
   * Display the create view for a new presentation.
   */
  public function create()
  {
    return View::make('presentation.create');
  }

  /**
   * Save a new presentation, create the first slide,
   * and redirect to the first slide's edit view.
   */
  public function store()
  {
    $inputs = Input::all();
    // generate a slug
    $inputs['slug'] = Str::slug($inputs['title']);
    // create the presentation
    $presentation = Presentation::create($inputs);
    // create the first slide
    $first_slide = new Slide(array('number' => 1));
    // add the first slide to the presentation
    $presentation->slides()->save($first_slide);
    // redirect to the first slide
    return Redirect::action('SlideController@edit', array($presentation->slug, 1))
      ->with('message', 'New presentation created.');
  }

  /**
   * Delete a presentation, and redirect to the
   * presentation index.
   */
  public function destroy($presentation_slug)
  {
    $presentation_query = Presentation::where('slug', $presentation_slug);
    // delete all slides
    $presentation_query->first()->slides()->delete();
    // delete the presentation itself
    $presentation_query->delete();
    return Redirect::action('PresentationController@index');
  }
}
