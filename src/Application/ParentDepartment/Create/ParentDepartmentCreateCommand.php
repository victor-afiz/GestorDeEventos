<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:20
 */

namespace App\Application\ParentDepartment\Create;

class ParentDepartmentCreateCommand
{
    /**
     * @var string
     */
    private $name;

    /**
     * ParentDepartmentCreateCommand constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }
}