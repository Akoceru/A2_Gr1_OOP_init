<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/01/2015
 * Time: 15:03
 */

require __DIR__."/vendor/autoload.php";

use Cartman\Init\Pokemon\PokemonFire;
use Cartman\Init\Pokemon\PokemonPlant;
use Cartman\Init\Pokemon\PokemonWater;

$pokemon = new PokemonFire();
$bulbizarre = new PokemonPlant();
$amphinobi = new PokemonWater();

$pokemon
    ->setName('Salamèche')
    ->setHp(13)
;



$bulbizarre
    ->setName('bulbizarre')
    ->setHp(13)
;

$amphinobi
    ->setName('Grenousse')
    ->setHp(13)
;



$pokemons = [$amphinobi, $bulbizarre, $pokemon];
shuffle($pokemons);


$striker = array_pop($pokemons);
$goal = array_pop($pokemons);


$name1 = $striker->getName();
$name2 = $goal->getName();

$inter = 0;
$dead = false;
$round = 1;
$hpLeft = 0;
$currentAttack = 0;

 ?>
<h1><?php  echo $name1." VS ".$name2;  ?></h1>
<?php
    while($dead == false) {
        $nameStriker = $striker->getName();
        $nameGoal = $goal->getName();

        $i = mt_rand(1, 3);
        ?>
        <br>
        <h2>
            <?php
        echo "Round numero:".$round;
        ?> </h2>
        <?php
         ?>  <h3>
            <?php
        echo $nameStriker." attaque! ";
        ?>
        </h3>
        <?php
        for ($k = 1; $k <= $i; $k++) {

            $attack = mt_rand(1, 5);
            if (true === $striker->isTypeWeak($goal->getType()))
                $attack = (int)ceil($attack / 2);

            if (true === $striker->isTypeStrong($goal->getType()))
                $attack = (int)ceil($attack * 2);
            ?>
            <h3>
                <?php
                echo "Attack ".$k." / ".$i;
                ?>
            </h3>
            <?php
            $goal->removeHP($attack);
            $hpLeft = $goal->getHp();
            ?>
            <h3>
                <?php
                echo $nameStriker.' dealt '.$attack.' to '.$nameGoal;
                ?> </h3>
                <h4>
                <?php
                echo $nameGoal." has ".$hpLeft."health point left ";
                ?>
                </h4>
            <?php
            if ($goal->getHP() <= 0) {

                ?>
                <h3>
                    <?php
                echo $nameGoal." is KO"
                ?> </h3>  <?php
                $dead = true;
                break;

            } else{

            }



        }
        $inter = $striker;
        $striker = $goal;
        $goal = $inter;
        $round++;

    }



