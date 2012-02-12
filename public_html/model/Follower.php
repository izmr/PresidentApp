<?php
require_once dirname(__FILE__) . '/MySQL.php';
require_once dirname(__FILE__) . '/Job.php';

class Follower extends MySQL
{
  public $table = 'follower';
  public $schema = array(
    'facebook_id' => '',
    'name' => 'No name',
    'power' => 0,
    'money' => 0,
    'pic' => '',
    'job_name' => 'NEET' // 仮置き
  );

  public function __construct() {
    $this->setJobAtRandom();
    parent::__construct();
  }

  public function setJobAtRandom() {
    $this->schema['job_name'] = Job::getJob('1234');
    return $this->schema['job_name'];
  }
}
