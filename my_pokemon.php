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

if (empty($_SESSION) ) {
//echo 'Forbidden !';
    header('Location: index.php');
    die;
}

$trainer = new TrainerModel();
$have_pokemon = $trainer->getHavePokemon();
if($have_pokemon = 0)
{
    header('location: index.php');
}

$poke = new PokemonModel();

/** @var  \Doctrine\ORM\EntityRepository */
$pokeRepository = $em->getRepository('Akoceru\PokemonBattle\Model\PokemonModel');
$pokes =$pokeRepository->find($_SESSION["id"]);

$hp = $pokes->getHP();
$pokename = $pokes->getName();
$type = $pokes->getType();




$twig = new Twig_Environment($loader,[
//'cache' => null,
]);


echo $twig->render('my_pokemon.html.twig', [
    "hp" => $hp,
    "session" => $_SESSION,
    "pokename" => $pokename,
    "type" => $type,
]);