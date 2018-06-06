<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 17/05/18
 * Time: 9:50
 */

namespace App\Application\Clothe\Update;


class ClotheUpdateCommand
{
    private $id;
    private $clotheCategoryID;
    private $name;
    private $gender;
    private $photo;
    private $description;

    /**
     * ClotheUpdateCommand constructor.
     * @param $id
     * @param $clotheCategoryID
     * @param $name
     * @param $gender
     * @param $photo
     * @param $description
     */
    public function __construct($id,$clotheCategoryID, $name, $gender, $photo, $description)
    {
        $this->id = $id;
        $this->clotheCategoryID = $clotheCategoryID;
        $this->name = $name;
        $this->gender = $gender;
        $this->photo = $photo;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getClotheCategoryID()
    {
        return $this->clotheCategoryID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $clotheCategoryID
     */
    public function setClotheCategoryID($clotheCategoryID): void
    {
        $this->clotheCategoryID = $clotheCategoryID;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

}