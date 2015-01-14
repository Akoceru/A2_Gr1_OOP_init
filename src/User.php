<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 09/01/2015
 * Time: 12:00
 */

namespace Cartman\Init;

/**
 * Class User
 * @package Cartman\Init
 *
 * @Entity
 * @Table(name="user")
 */
class User {

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
     * @Column(name="username", type="string", length=20, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=20)
     */
    private $password;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
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
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}