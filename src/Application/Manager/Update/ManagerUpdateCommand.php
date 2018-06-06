<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:53
 */

namespace App\Application\Manager\Update;

class ManagerUpdateCommand
{
    private $id;
    private $nickName;
    private $name;
    private $photo;
    private $rol;
    private $password;
    private $email;

    /**
     * ManagerCreateCommand constructor.
     * @param $id
     * @param $nickName
     * @param $name
     * @param $photo
     * @param $rolID
     * @param $password
     * @param $email
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id, $nickName, $name, $photo, $rol, $password, $email)
    {
        $this->id = $id;
        $this->nickName = $nickName;
        $this->name = $name;
        $this->photo = $photo;
        $this->rol = $rol;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function nickName()
    {
        return $this->nickName;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function photo()
    {
        return $this->photo;
    }

    /**
     * @return mixed
     */
    public function rol()
    {
        return $this->rol;
    }

    /**
     * @return mixed
     */
    public function password()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function email()
    {
        return $this->email;
    }

}