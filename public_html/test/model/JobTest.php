<?php
require dirname(__FILE__) . '/../../model/Job.php';

$Model = new Job();
echo Job::getJob();
