<?php


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Illuminate\Database\Capsule\Manager;


// Symfony dependency injection IOC container
$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
$result = $loader->load('services.yaml');


// load laravel dataaccess layer , database manager, from symfony DI, lazy loading by default
$dbManager = $containerBuilder->get('manager');


//print_r($containerBuilder->get('manager'));

// $results = Manager::select(Manager::raw('select * from users'));

##-------------------------------------

$entityManager = $containerBuilder->get('entityManager');

// workaround for Doctrine enum type
$conn = $entityManager->getConnection();
$conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

// require not require once is not supposed to be called encapsulated inside something else
#require "doctrineBootstrap.php";
