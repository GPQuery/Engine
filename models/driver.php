<?php
/**
 * Driver model represents table `drivers`
 *
 * @var int     driverId
 * @var string  driverRef
 * @var int     number
 * @var string  code
 * @var string  forename
 * @var string  surname
 * @var date    dob
 * @var string  nationality
 * @var string  url
 */
class Driver extends \Illuminate\Database\Eloquent\Model
{

  protected $primaryKey = 'driverId';
  public $timestamps = false;

  // Result Relationship: One to Many
  public function result()  {
    return $this->hasMany('Result', 'driverId', 'driverId');
  }
  // LapTime Relationship: One to Many
  public function lapTimes()  {
    return $this->hasMany('LapTimes', 'driverId', 'driverId');
  }
  // PitStop Relationship: One to Many
  public function pitStops()  {
    return $this->hasMany('PitStops', 'driverId', 'driverId');
  }

}