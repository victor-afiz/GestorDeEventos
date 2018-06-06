<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 14:17
 */

namespace App\Application\Manager\Delete;


class ManagerDeleteCommand
{
    private $id;

    /**
     * ManagerDeleteCommand constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }



}