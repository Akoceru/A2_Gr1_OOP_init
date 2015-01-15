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

if (empty($_SESSION) )
{
//echo 'Forbidden !';
    header('Location: index.php');
    die;
}

$currentDate = strtotime("now");

/** @var  \Doctrine\ORM\EntityRepository */
$trainerRepository = $em->getRepository('Akoceru\PokemonBattle\Model\TrainerModel');

/** @var  \Doctrine\ORM\EntityRepository */
$pokeRepository = $em->getRepository('Akoceru\PokemonBattle\Model\PokemonModel');

/** @var \Akoceru\PokemonBattle\Model\TrainerModel $trainer */
$trainer = $trainerRepository->find($_SESSION['id']);

/** @var \Akoceru\PokemonBattle\Model\TrainerModel $poke_id */
$poke_id = $trainer->getPokemonId();

/** @var \Akoceru\PokemonBattle\Model\PokemonModel $poke */
$poke = $pokeRepository->find($poke_id);

/** @var \Akoceru\PokemonBattle\Model\PokemonModel $currentHp */
$currentHp = $poke->getHp();


    /** @var \Akoceru\PokemonBattle\Model\TrainerModel $date */
    $date = $trainer->getLastHeal();

    if ($currentDate - $date < (3600 * 24))
        header("location: heal-error.php");
    else {
        if($currentHp == 100)
        {
            header("location: my_pokemon.php");
        } else
        {
        $trainer->setLastHeal($currentDate);
        $poke->setHp(100);
        $em->flush();
        header("location: my_pokemon.php");
    }
}