<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 15/01/2015
 * Time: 15:05
 */


require __DIR__.'/vendor/autoload.php';


use Akoceru\PokemonBattle\Model\TrainerModel;
use Akoceru\PokemonBattle\Model\PokemonModel;
use Cocur\Slugify\Slugify;




/** @var $em \Doctrine\ORM\EntityManager */
$em = require __DIR__.'/bootstrap.php';

session_start();

if (empty($_SESSION) ) {
//echo 'Forbidden !';
    header('Location: index.php');
    die;
}

$currentDate = strtotime("now");
$trainerRepository = $em->getRepository('Akoceru\PokemonBattle\Model\TrainerModel');
$pokeRepository = $em->getRepository('Akoceru\PokemonBattle\Model\PokemonModel');
$trainer = $trainerRepository->find($_SESSION['id']);

$poke_id = $trainer->getPokemonId();

$poke = $pokeRepository->find($poke_id);
$date = $trainer->getLastHeal();

if($currentDate-$date < (3600*24))
    header("location: heal-error.php");
else {
    $trainer->setLastHeal($currentDate);
    $poke->setHp(100);
    $em->flush();

}
