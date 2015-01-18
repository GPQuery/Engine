<?php
/**
 * Race model represents table `races`.
 *
 * @var int     raceId
 * @var int     year
 * @var int     round
 * @var int     circuitId
 * @var varchar name
 * @var date    date
 * @var time    time
 * @var varchar url
 */
class Race extends \Illuminate\Database\Eloquent\Model
{

  protected $primaryKey = 'raceId';
  public $timestamps = false;

  // Circuit Relationship - Many to One
  public function circuit() {
    return $this->belongsTo('Circuit', 'circuitId', 'circuitId');
  }

  // Season Relationship - Many to One
  public function season()  {
    return $this->belongsTo('Season', 'year', 'year');
  }
  
}