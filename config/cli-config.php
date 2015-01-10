<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 07/01/2015
 * Time: 11:42
 */

$entityManager =  require __DIR__.'/../bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);