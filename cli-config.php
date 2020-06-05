<?php
// cli-config.php
require_once "doctrineBootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);

