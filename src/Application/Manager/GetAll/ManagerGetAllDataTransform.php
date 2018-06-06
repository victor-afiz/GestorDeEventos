<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 10:03
 */

namespace App\Application\Manager\GetAll;


interface ManagerGetAllDataTransform
{
    public function transform($managers);
}