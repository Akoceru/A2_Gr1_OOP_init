<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 11/01/2015
 * Time: 22:25
 */

require __DIR__.'/vendor/autoload.php';


use Akoceru\PokemonBattle\Model\TrainerModel;
use Akoceru\PokemonBattle\Model\PokemonModel;
use Cocur\Slugify\Slugify;


require __DIR__.'/_header.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem([
    __DIR__.'/view',
]);

/** @var $em \Doctrine\ORM\EntityManager */
$em = require __DIR__.'/bootstrap.php';

session_start();

/** @var  \Doctrine\ORM\EntityRepository */
$userRepository = $em->getRepository('Akoceru\PokemonBattle\Model\TrainerModel');
$pokeRepository = $em->getRepository('Akoceru\PokemonBattle\Model\PokemonModel');
$pokes =$pokeRepository->findAll();
$users = $userRepository->findAll();


$twig = new Twig_Environment($loader,[
//'cache' => null,
]);


echo $twig->render('battle.html.twig', [
    "users" => $users,
    "pokes" => $pokes,
]);