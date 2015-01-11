<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/01/2015
 * Time: 15:40
 */

namespace Akoceru\PokemonBattle;



use Akoceru\PokemonBattle\Model\TrainerInterface;
use Akoceru\PokemonBattle\Model\TrainerModel;


/**
 * @ORM\MappedSuperclass
 * @ORM\Table(name="trainer")
 * @ORM\Entity()
 */
class Trainer extends TrainerModel implements TrainerInterface

{


}