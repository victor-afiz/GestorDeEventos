<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:26
 */

namespace App\Application\Department\Create;

class DepartmentCreateCommand
{
    private $name;
    private $parentID;

    /**
     * DepartmentCreateCommand constructor.
     * @param $parentID
     * @param string $name
     */
    public function __construct($parentID, $name)
    {
        $this->name = $name;
        $this->parentID = $parentID;
    }

    /**
     * @return mixed
     */
    public function parentID()
    {
        return $this->parentID;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}