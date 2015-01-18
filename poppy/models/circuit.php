<?php
/**
 * Circuit model represents table `circuits`
 *
 * @var int     circuitId
 * @var string  circuitRef
 * @var string  name
 * @var string  location
 * @var string  country
 * @var float   lat
 * @var float   lng
 * @var int     alt
 * @var string  url
 */
class Circuit extends \Illuminate\Database\Eloquent\Model
{

  protected $primaryKey = 'circuitId';
  public $timestamps = false;

  // Race Relationship: One to Many
  public function races() {
    return $this->hasMany('Race', 'circuitId', 'circuitId');
  }
}