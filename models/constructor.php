<?php
/**
 * Constructor model represents table `constructors`
 *
 * @var int     constructorId
 * @var int     constructorRef
 * @var string  name
 * @var string  nationaltiy
 * @var string  url
 */
class Constructor extends \Illuminate\Database\Eloquent\Model
{

  protected $primaryKey = 'constructorId';
  public $timestamps = false;

  // Result Relationship: One to Many
  public function result()  {
    return $this->hasMany('Result', 'constructorId', 'constructorId');
  }

}