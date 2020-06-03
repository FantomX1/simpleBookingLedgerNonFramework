<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

require(__DIR__ . '/vendor/autoload.php');


ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);


$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
$loader->load('services.yaml');

use Illuminate\Database\Capsule\Manager;



$containerBuilder->get('manager');

//print_r($containerBuilder->get('manager'));

$results = Manager::select(Manager::raw('select * from users'));


var_dump($results);



