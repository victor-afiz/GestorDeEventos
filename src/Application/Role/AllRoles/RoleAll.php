<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:27
 */

namespace App\Application\Role\AllRoles;

use App\Domain\Services\Role\RoleAllService;

class RoleAll
{
    private $roleAll;
    private $dataTransform;

    public function __construct(RoleAllService $roleCreator, RoleAllDataTransform $dataTransform)
    {
        $this->roleAll = $roleCreator;
        $this->dataTransform = $dataTransform;
    }

    public function handle(RoleAllCommand $roleCreateCommand)
    {
       return $this->dataTransform->transform($this->roleAll->__invoke());
    }
}