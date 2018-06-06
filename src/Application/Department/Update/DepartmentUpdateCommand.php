<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 10:04
 */

namespace App\Application\Department\Update;

class DepartmentUpdateCommand
{
    private $id;
    private $parentId;
    private $name;

    /**
     * DepartmentUpdateCommand constructor.
     * @param $id
     * @param $parentId
     * @param $name
     */
    public function __construct($id, $parentId, $name)
    {
        $this->id = $id;
        $this->id = $parentId;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
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
    public function parentId()
    {
        return $this->parentId;
    }
}