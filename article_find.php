<?php

use Cartman\Init\Article;
use Cocur\Slugify\Slugify;

/** @var $em \Doctrine\ORM\EntityManager */
$em = require __DIR__.'/bootstrap.php';

$article = new Article();
$slugify = new Slugify();

/** @var  \Doctrine\ORM\EntityRepository */
$articleRepository = $em->getRepository('Cartman\init\Article');

$article = $articleRepository->find(2);
$articles = $articleRepository->findAll();

var_dump($article);
var_dump($articles);