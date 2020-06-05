<?php

require(__DIR__ . '/vendor/autoload.php');

ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);


require "bootstrap.php";

#######################
$appConfig = [];

$app = new \framework\App($appConfig);

$app->run();

//var_dump($results);





