<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 19:01
 */

namespace App\Domain\Model\User;


interface UserRepository
{
    public function findByID($id);
}