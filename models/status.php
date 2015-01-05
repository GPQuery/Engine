<?php
/**
 * Status model represents table `status`.
 *
 * @var int     statusId
 * @var string  status
 */
class Status extends \Illuminate\Database\Eloquent\Model
{

  protected $table = 'status';
  protected $primaryKey = 'statusId';
  public $timestamps = false;

  // Result Relationship: One to Many
  public function results() {
    return $this->hasMany('Result', 'statusId', 'statusId');
  }

}