<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 07/01/2015
 * Time: 12:23
 */

require __DIR__.'/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [

    "srcpoke",
];
$isDevMode = true;

// the connection configuration
$dbParams = include __DIR__."/config/config.php";

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
return EntityManager::create($dbParams, $config);