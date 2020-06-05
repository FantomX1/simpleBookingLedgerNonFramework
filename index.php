<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Illuminate\Database\Capsule\Manager;

require(__DIR__ . '/vendor/autoload.php');

ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);


// Symfony dependency injection IOC container
$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
$result = $loader->load('services.yaml');


// load laravel dataaccess layer , database manager, from symfony DI, lazy loading by default
$dbManager = $containerBuilder->get('manager');

//print_r($containerBuilder->get('manager'));

// $results = Manager::select(Manager::raw('select * from users'));

##-------------------------------------

// require not require once is not supposed to be called encapsulated inside something else
require "doctrineBootstrap.php";

#######################
$appConfig = [];

$app = new \framework\App($appConfig);

$app->run();

//var_dump($results);





