<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
//
$paths = [
    './models/entity',
    './models/repository'
];
// this might not work due to cache , not confirmed , not resimulated
// https://stackoverflow.com/questions/48050638/symfony-3-4-no-metadata-classes-to-process-error
// doctrine:cache:clear-metadata


//$isDevMode = false;
//
//// the connection configuration
//$dbParams = array(
//    'driver'   => 'pdo_mysql',
//    'user'     => 'root',
//    'password' => 'root',
//    'dbname'   => 'simpleBookingLedger',
//    'host'     => 'mysqlservice',
//);
//
//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
//$entityManager = EntityManager::create($dbParams, $config);


// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode                 = true;
$proxyDir                  = null;
$cache                     = null;
$useSimpleAnnotationReader = false;

if (1) {
$config                    = Setup::createAnnotationMetadataConfiguration(
    $paths,
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);

}


// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
//$conn = array(
//    'driver' => 'pdo_sqlite',
//    'path'   => __DIR__ . '/db.sqlite',
//);

$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'simpleBookingLedger',
    'host'     => 'mysqlservice',
);

#$entityManager = EntityManager::create($conn, $config);
#$entityManager = $containerBuilder->get('setup');

//$containerBuilder->setParameter('mailer.transport', 'sendmail');
if (0){
$containerBuilder
    ->register('entityManager', EntityManager::class)
 //   ->addArgument('%mailer.transport%')
    //->addMethodCall('create', [$conn, $config])
    ->setFactory('Doctrine\ORM\EntityManager::create')
    ->addArgument($conn)
    ->addArgument($config)
;
}

$entityManager = $containerBuilder->get('entityManager');
$a=2;
// obtaining the entity manager
//$entityManager = EntityManager::create($conn, $config);
