<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;



require(__DIR__ . '/vendor/autoload.php');




ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

#require_once "vendor/autoload.php";




$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
$loader->load('services.yaml');




//echo '<pre>';
//
//print_r($containerBuilder->get('mailer'));
////var_dump($containerBuilder->get('mailer'));
//echo '</pre>';





//use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Capsule\Manager;

//$capsule = new Capsule;

//$capsule->addConnection([
//    'driver'    => 'mysql',
//    'host'      => 'mysqlservice',
//    'database'  => 'simpleBookingLedger',
//    'username'  => 'root',
//    'password'  => 'root',
//    'charset'   => 'utf8',
//    'collation' => 'utf8_unicode_ci',
//    'prefix'    => '',
//]);


// otherwise inner methods probably won't find DB:: something call
//$capsule->setAsGlobal();



//Capsule::raw('delete from users');
//
//Capsule::statement('
//    CREATE TABLE IF NOT EXISTS `users2` (
//      `id` int(11) NOT NULL AUTO_INCREMENT,
//      `name` text,
//      PRIMARY KEY (`id`)
//    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
//');

// Capsule::delete, DB::delete

$containerBuilder->get('manager');

print_r($containerBuilder->get('manager'));

//$containerBuilder->get('database')::select(Capsule::raw('select * from users'));
$results = Manager::select(Manager::raw('select * from users'));
//$results = Capsule::select(Capsule::raw('select * from users'));

//$results = Capsule::raw('select * from users');
var_dump($results);


//include "bootstrap.php";

