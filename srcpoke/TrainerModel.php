<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 11/01/2015
 * Time: 15:22
 */

namespace Akoceru\PokemonBattle\Model;

/**
 * Class TrainerModel
 * @package Akoceru\PokemonBattle\Model
 *
 * @Entity
 * @Table(name="trainer")
 */
class TrainerModel implements TrainerInterface
{
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="username", type="string", length=20)
     */
    private $username;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=20)
     */
    private $password;

    /**
     * @var string
     *
     * @Column(name="pokemon_name", type="string", length=20, options={"default":"srcpoke"})
     */
    private $pokemon_name = 'srcpoke';


    private $lastHeal;

    /**
     * @var integer
     *
     * @Column(name="have_pokemon", type="integer")
     */
    private $have_pokemon = 0;

    /**
     * @var integer
     *
     * @Column(name="lastBattle", type="integer")
     */
    private $lastBattle = 0;


    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * {@inheritdoc}
     * @return TrainerModel
     * @throws \Exception
     */
    public function setUsername($username)
    {
        if(is_string($username))
            $this->username = $username;
        else
            throw new \Exception("Title must be string");

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     * @return TrainerModel
     * @throws \Exception
     */
    public function setPassword($password)
    {
        if(is_string($password))
            $this->password = $password;
        else
            throw new \Exception("Title must be string");

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * {@inheritdoc}
     */
    public function getHavePokemon()
    {
        return $this->have_pokemon;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     * @return PokemonModel
     */
    public function setHavePokemon($have_pokemon)
    {
        if(is_int($have_pokemon)) {
            $this->have_pokemon = $have_pokemon;
        }
        else
            throw new \Exception("Is not an integer");
    }

    /**
     * {@inheritdoc}
     */
    public function getPokemonName()
    {
        return $this->pokemon_name;
    }

    /**
     * {@inheritdoc}
     *
     * @return TrainerModel
     * @throws \Exception
     */
    public function setPokemonName($pokemon_name)
    {
        if(is_string($pokemon_name))
            $this->pokemon_name = $pokemon_name;
        else
            throw new \Exception("Must be a string");

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastBattle()
    {
        return $this->lastBattle;
    }

    /**
     * {@inheritdoc}
     *
     * @return TrainerModel
     * @throws \Exception
     */
    public function setLastBattle($lastBattle)
    {
        if(is_int($lastBattle))
            $this->lastBattle = $lastBattle;
        else
            throw new \Exception("Is not integer");

        return $this;

    }

    /**
     * @return int
     */
    public function getLastHeal()
    {
        return $this->lastHeal;
    }

    /**
     * {@inheritdoc}
     *
     * @return TrainerModel
     * @throws \Exception
     */
    public function setLastHeal($lastHeal)
    {
        if(is_int($lastHeal))
            $this->lastHeal = $lastHeal;
        else
            throw new \Exception("Is not integer");

        return $this;
    }



}