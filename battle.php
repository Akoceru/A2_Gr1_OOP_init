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

if (empty($_SESSION)) {
//echo 'Forbidden !';
    header('Location: index.php');
    die;
}

/** @var  \Doctrine\ORM\EntityRepository */
$userRepository = $em->getRepository('Akoceru\PokemonBattle\Model\TrainerModel');
/** @var  \Doctrine\ORM\EntityRepository */
$pokeRepository = $em->getRepository('Akoceru\PokemonBattle\Model\PokemonModel');

$users = $userRepository->findAll();



//$lol = $pokes->getType();

//$prout = $pokes->isTypeWeak($lol, PokemonModel::TYPE_WATER);

//var_dump($prout);



$twig = new Twig_Environment($loader,[
//'cache' => null,
]);


echo $twig->render('battle.html.twig', [
    "users" => $users,
    "session" => $_SESSION,
]);