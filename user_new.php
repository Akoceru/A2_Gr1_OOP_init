<?php

use Cartman\Init\User;
use Cocur\Slugify\Slugify;

/** @var $em \Doctrine\ORM\EntityManager */
$em = require __DIR__.'/bootstrap.php';

$user = new User();
$slugify = new Slugify();

if (!empty($_POST["username"]) && !empty($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];


    $user
        ->setUsername($username)
        ->setPassword($password);


    $em->persist($user);
    $em->flush();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form method="post" action="#">
    <label for="username">Username:</label>
    <p><input type="text" id="username" name="username" required autofocus/></p>
    <label for="password">Password:</label>
    <p><input type="text" id="password" name="password" required/></p>
    <input type="submit" value="Envoyer" />
</form>

</body>
</html>
<?php
var_dump($user);