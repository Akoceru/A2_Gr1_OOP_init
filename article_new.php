<?php

use Cartman\Init\Article;
use Cocur\Slugify\Slugify;

/** @var $em \Doctrine\ORM\EntityManager */
$em = require __DIR__.'/bootstrap.php';

$article = new Article();
$slugify = new Slugify();


$article
    ->setTitle("fqdgqduigfsgfhdgfuuoi_çàé)&à'rdfdwshkgqsgfyqdgfshdhjsfdjhsg")
    ->setSlug($slugify->slugify('sqdhsdhzeuhreuhsfuGSDFKGSFDKGSFDKGFKJDFSHKSDJFGUIFEGFKGQSUFDKGDKGK'))
    ->setStatus(Article::STATUS_PENDING);

$em->persist($article);
$em->flush();

var_dump($article);