<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 15:48
 */

namespace App\Application\Clothe\Creator;


class ClotheCreateCommand
{
    private $id;
    private $clotheCategoryID;
    private $name;
    private $gender;
    private $photo;
    private $description;

    /**
     * ClotheCreateCommand constructor.
     * @param $clotheCategoryID
     * @param $name
     * @param $gender
     */
    public function __construct($id, $clotheCategoryID, $name, $gender, $photo, $description)
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


}