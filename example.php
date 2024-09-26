<?php

use SWE\SoftGardenApi\Api\SoftGarden;
use SWE\SoftGardenApi\Channel;
use SWE\SoftGardenApi\Job;

const DEBUG = false;

require_once __DIR__ . '/vendor/autoload.php';

$break = PHP_EOL . PHP_EOL;

// TODO: Paste in your client id.
$clientId = '';
$softGarden = SoftGarden::getInstance();
$softGarden->setClientId($clientId);

// Get all channels.
$channels = $softGarden->getChannels();
echo 'Channels:' . PHP_EOL;
var_dump($channels);
echo $break;

// Get the first channel.
$channel = $channels->getItem(0);
if (!$channel instanceof Channel) {
    return;
}

// Get the basket of a channel.
$basket = $softGarden->getJobBasket($channel->getId());
echo 'Basket:' . PHP_EOL;
var_dump($basket);
echo $break;

// Get all jobs of a channel.
$jobs = $softGarden->getJobs($channel->getId());
echo 'Jobs:' . PHP_EOL;
var_dump($jobs);
echo $break;

// Get iterating through jobs of a channel.
$jobs = $softGarden->getJobs($channel->getId());
echo 'Jobs:' . PHP_EOL;
foreach ($jobs as $job) {
    var_dump($job);
}
echo $break;

// Get the first job.
$job = $jobs->getItem(0);
if (!$job instanceof Job) {
    return;
}

// Get the job with the id "xy"
$myJob = $softGarden->getJob($channel->getId(), $job->getId());
echo 'Job:' . PHP_EOL;
var_dump($myJob);
echo $break;

// Get all questions of a job.
$questions = $softGarden->getJobQuestions($job->getId());
echo 'Job Questions:' . PHP_EOL;
var_dump($questions);
echo $break;

// It is possible to get the result as an array instead of objects:
echo 'Channels as array:' . PHP_EOL;
var_dump($channels->toArray());
echo $break;
