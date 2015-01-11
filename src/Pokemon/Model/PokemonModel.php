<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/01/2015
 * Time: 15:17
 */

namespace Cartman\Init\Pokemon\Model;

/**
 * Class PokemonModel
 * @package Cartman\Init\Pokemon\Model
 *
 * @Entity
 * * @Table(name="pokemon")
 */
abstract class PokemonModel implements PokemonInterface
{

    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer", )
     */
    private $id;

    /**
     * @var int
     *
     * @Column(name="user_id", type="integer")
     */
    private $user_id;


    /**
     * @var string
     *
     * @Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var int
     *
     * @Column(name="hp", type="integer")
     */
    private $hp;

    /**
     * @var int
     *
     * @Column(name="type", type="integer")
     */
    private $type;

    const TYPE_FIRE = 0;

    const TYPE_WATER = 1;

    const TYPE_PLANT = 2;

    const TYPE_ELECTRIC = 3;

    const TYPE_PSY = 4;

    const TYPE_NORMAL = 5;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setName($name)
    {
        if(is_string($name))
            $this->name = $name;
        else
            throw new \Exception('name must be string');

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getHP()
    {
        return $this->hp;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setHp($hp)
    {
        if(is_int($hp) && $hp > 0)
            $this->hp = $hp;
        else
            throw new \Exception('HP Must be an integer and must be > 0');

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function addHP($hp)
    {
        if(is_int($hp) && $hp > 0)
            $this->hp += $hp;
        else
            throw new \Exception('HP Must be an integer and must be > 0');

        return $this->hp;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function removeHP($hp)
    {
        if(is_int($hp) && $hp > 0)
          $this->hp = ($this->hp <= $hp) ? 0 : $this->hp - $hp;
        else
            throw new \Exception('HP Must be an integer and must be > 0');

        return $this->hp;
    }

    public function getType()
    {

        return $this->type;

    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setType($type)
    {

        if(true === in_array($type, [
                self::TYPE_FIRE,
                self::TYPE_WATER,
                self::TYPE_PLANT,
                self::TYPE_ELECTRIC,
                self::TYPE_PSY,
                self::TYPE_NORMAL
            ]))
                $this->type = $type;
        else
            throw new \Exception('Bad type');

        return $this;
    }

    /**
     * @param int $type
     * @return bool
     */
    abstract public function isTypeWeak($type);

    /**
     * @param int $type
     * @return bool
     */
    abstract public function isTypeStrong($type);

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     *
     * @throws \Exception
     * @return PokemonModel
     */
    public function setUserId($user_id)
    {
        if(is_int($user_id) && $user_id > 0)
            $this->user_id = $user_id;
        else
            throw new \Exception("user id must be an integer and > 0");

        return $this;
    }



}