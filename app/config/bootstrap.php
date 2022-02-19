<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . "/../vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array("src"), $isDevMode);

$conn = array(
    'driver' => 'pdo_pgsql',
    'host' => 'localhost',
    'port' => '54324',
    'dbname' => 'auth',
    'user' => 'postgres',
    'password' => 'postgres',
);

$entityManager = EntityManager::create($conn, $config);