<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

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
