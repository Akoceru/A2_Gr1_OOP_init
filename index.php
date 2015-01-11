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


$article = new Article();
$article
    ->setId(5)
    ->setTitle($title)
    ->setSlug($slugify->slugify($title))
    ->setStatus(Article::STATUS_PENDING);
;
var_dump($article);