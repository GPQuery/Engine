<?php
/**
 * Request model represents table `requests`.
 *
 * @var int     requestId
 * @var int     raceId
 * @var date    date
 * @var time    time
 */
class Race extends \Illuminate\Database\Eloquent\Model
{

  protected $primaryKey = 'requestId';
  public $timestamps = false;

  // Race Relationship - Many to One
  public function race() {
    return $this->belongsTo('Race', 'raceId', 'raceId');
  }

  // Season Relationship - Many to One
  public function season()  {
    return $this->belongsTo('Season', 'year', 'year');
  }
  
}