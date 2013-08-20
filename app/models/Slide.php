<?php
class Slide extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'slides';

  protected $fillable = array('id', 'contents', 'number');

  /**
   * Specify the relationship between Slides and Presentations
   */
  public function presentation()
  {
    return $this->belongsTo('Presentation', 'presentation_id');
  }
}
