<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/01/2015
 * Time: 17:04
 */

namespace Cartman\Init\Pokemon;
use Cartman\Init\Pokemon\Model\PokemonModel;

class PokemonWater extends PokemonModel
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setType(self::TYPE_WATER);
    }

    /**
     * {@inheritdoc}
     */
    public function isTypeWeak($type)
    {

        return (self::TYPE_PLANT === $type) ? true : false;
    }

    /**
     * {@inheritdoc}
     */
    public function isTypeStrong($type)
    {
        return(self::TYPE_FIRE === $type) ? true : false;
    }

}