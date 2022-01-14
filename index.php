<?php

$autoload = __DIR__ . '/vendor/autoload.php';

if (!file_exists($autoload)) {
    $autoload = dirname(__DIR__) . '/vendor/autoload.php';
}

if (!file_exists($autoload)) {
    exit('Unable to find autoload.php');
}

require_once $autoload;
require_once __DIR__ . '/example.php';