<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 15/01/2015
 * Time: 11:58
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

$userRepository = $em->getRepository('Akoceru\PokemonBattle\Model\TrainerModel');
$pokeRepository = $em->getRepository('Akoceru\PokemonBattle\Model\PokemonModel');

$useratk = $userRepository->find($_SESSION['id']);
$have_pokmon = $useratk->getHavePokemon();
if (empty($_SESSION) || empty($_GET['id']) || $have_pokemon = 0) {
//echo 'Forbidden !';
    header('Location: index.php');
    die;
}

/** @var  \Doctrine\ORM\EntityRepository */


$userdef = $userRepository->find($_GET['id']);

if(empty($userdef))
{
    header("location: index.php");
}

$have_pokemon2 = $userdef->getHavePokemon();



if($have_pokemon2 == 0)
{
    header("location: index.php");
}

$trainerdef = $userdef->getPokemonId();

$traineratk = $useratk->getPokemonId();

$pokemondef = $pokeRepository->find($trainerdef);
$pokemonatk = $pokeRepository->find($traineratk);

$pokename1 = $pokemondef->getName();
$pokename2 = $pokemonatk->getName();
var_dump($pokename1, $pokename2);

//$lol = $pokes->getType();

//$prout = $pokes->isTypeWeak($lol, PokemonModel::TYPE_WATER);

//var_dump($prout);

$type1 = $pokemondef->getType();
$type2 = $pokemonatk->getType();

$attack = mt_rand(5, 10);

$weak = $pokemonatk->isTypeWeak($type2, $type1);
$strong = $pokemonatk->isTypeStrong($type2, $type1);
if($strong === true)
{
    $attack = $attack * 2;
}

if($weak === true)
{
    $attack = (ceil($attack/2));
}


$pokemondef->RemoveHp($attack);
var_dump($attack);
$em->flush();

$twig = new Twig_Environment($loader,[
//'cache' => null,
]);


echo $twig->render('attack.html.twig', [
    "session" => $_SESSION,
    "pokeatk" => $pokename1,
    "pokedef" => $pokename2,
    "attack" => $attack,
]);