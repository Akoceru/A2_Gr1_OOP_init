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

/** @var  \Doctrine\ORM\EntityRepository */
$userRepository = $em->getRepository('Akoceru\PokemonBattle\Model\TrainerModel');
/** @var  \Doctrine\ORM\EntityRepository */
$pokeRepository = $em->getRepository('Akoceru\PokemonBattle\Model\PokemonModel');

$useratk = $userRepository->find($_SESSION['id']);

$have_pokmon = $useratk->getHavePokemon();

$lastBattle = $useratk->getLastBattle();

$currentTime = strtotime("now");

if($currentTime - $lastBattle <= (3600*6))
{
    header("location: index.php");
}
else {

    if (empty($_SESSION) || empty($_GET['id']) || $have_pokemon = 0) {
//echo 'Forbidden !';
        header('Location: index.php');
        die;
    }

    $userdef = $userRepository->find($_GET['id']);

    if (empty($userdef)) {
        header("location: index.php");
    }

    $have_pokemon2 = $userdef->getHavePokemon();


    if ($have_pokemon2 == 0) {
        header("location: index.php");
    }

    $trainerdef = $userdef->getPokemonId();

    $traineratk = $useratk->getPokemonId();

    $pokemondef = $pokeRepository->find($trainerdef);
    $pokemonatk = $pokeRepository->find($traineratk);

    $pokename2 = $pokemondef->getName();
    $pokename1 = $pokemonatk->getName();
    $currentHp = $pokemondef->getHp();

    if ($currentHp == 0) {
        header("location: index.php");
    }



    $type1 = $pokemondef->getType();
    $type2 = $pokemonatk->getType();

    $attack = mt_rand(5, 10);

    $weak = $pokemonatk->isTypeWeak($type2, $type1);
    $strong = $pokemonatk->isTypeStrong($type1, $type2);
    if ($strong === true) {
        $attack = $attack * 2;
    }

    if ($weak === true) {
        $attack = (int)ceil($attack / 2);
    }

    if ($currentHp < $attack) {
        $pokemondef->setHp(0);
    } else
        $pokemondef->RemoveHp($attack);


    $useratk->setlastBattle($currentTime);
    $em->flush();

    var_dump($strong);


    $twig = new Twig_Environment($loader, [
//'cache' => null,
    ]);


    echo $twig->render('attack.html.twig', [
        "session" => $_SESSION,
        "pokeatk" => $pokename1,
        "pokedef" => $pokename2,
        "attack" => $attack,
    ]);
}