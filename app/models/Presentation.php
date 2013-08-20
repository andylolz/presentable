<?php

class Presentation extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'presentations';

  protected $fillable = array('id', 'title', 'slug');

  /**
   * Specify the relationship between Presentations and Slides
   */
  public function slides()
  {
    return $this->hasMany('Slide', 'presentation_id');
  }

  /**
   * Helper method for fetching
   */
  public static function get_by_slug($slug) {
    return self::where('slug', $slug)->first();
  }
}
