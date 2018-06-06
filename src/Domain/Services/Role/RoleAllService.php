<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:34
 */

namespace App\Domain\Services\Role;

use App\Domain\Model\Role\Role;

class RoleAllService
{
    public function __invoke()
    {
        return Role::ROLES;
    }
}