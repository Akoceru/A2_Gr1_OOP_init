<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 05/01/2015
 * Time: 15:25
 */


require __DIR__.'/vendor/autoload.php';



use Cartman\Init\Article;
use Cocur\Slugify\Slugify;


//$article = new Article();
//$article
  //  ->setId(5)
   // ->setTitle($title)
   // ->setSlug($slugify->slugify($title))
   // ->setStatus(Article::STATUS_PENDING);
//;
//var_dump($article);

require __DIR__.'/_header.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem([
    __DIR__.'/view',
]);

/** @var $em \Doctrine\ORM\EntityManager */
$em = require __DIR__.'/bootstrap.php';

session_start();

if(isset($_SESSION))


$twig = new Twig_Environment($loader,[
//'cache' => null,
]);





if(isset($_SESSION["username"])){
    /** @var  \Doctrine\ORM\EntityRepository */
    $trainerRepository = $em->getRepository('Akoceru\PokemonBattle\Model\TrainerModel');


    /** @var \Akoceru\PokemonBattle\Model\TrainerModel $trainer */
    $trainer = $trainerRepository->find($_SESSION['id']);

    $have_pokemon = $trainer->getHavePokemon();

    echo $twig->render('index.html.twig', [
        "session" => $_SESSION,
        "username" => $_SESSION["username"],
        "have_pokemon" => $have_pokemon
    ]);

}
else{
    echo $twig->render('index.html.twig', [
        "session" => $_SESSION,

    ]);

}