<?php
/**
 * Result model represents table `results`
 *
 * @var int     resultId
 * @var int     raceId
 * @var int     driverId
 * @var int     constructorId
 * @var int     number
 * @var int     grid
 * @var int     position
 * @var string  positionText
 * @var int     positionOrder
 * @var float   points
 * @var int     laps
 * @var string  time
 * @var int     milliseconds
 * @var int     fastestLap
 * @var int     rank
 * @var string  fastestLapTime
 * @var string  fastestLapSpeed
 * @var int     statusId
 */
class Result extends \Illuminate\Database\Eloquent\Model
{

  protected $primaryKey = 'resultId';
  public $timestamps = false;

  // Race Relationship: Many to One
  public function race()  {
    return $this->belongsTo('Race', 'raceId', 'raceId');
  }

  // Driver Relationship: Many to One
  public function driver()  {
    return $this->belongsTo('Driver', 'driverId', 'driverId');
  }

  // Constructor Relationship: Many to One
  public function constructor() {
    return $this->belongsTo('Constructor', 'constructorId', 'constructorId');
  }

  // Status Relationship: Many to One
  public function status()  {
    return $this->belongsTo('Status', 'statusId', 'statusId');
  }

}