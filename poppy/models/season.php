<?php
/**
 * Season model represents table `Seasons`
 *
 * @var int     year
 * @var string  url
 */
class Season extends \Illuminate\Database\Eloquent\Model
{

  protected $primaryKey = 'year';
  public $incrementing = false;
  public $timestamps = false;

  // Race Relationship: One to Many
  public function races() {
    return $this->hasMany('Race', 'year', 'year');
  }

}