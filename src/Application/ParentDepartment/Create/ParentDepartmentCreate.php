<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:20
 */

namespace App\Application\ParentDepartment\Create;

use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Services\ParentDepartment\ParentDepartmentCreatorService;

class ParentDepartmentCreate
{
    private $parentDepartmentCreator;

    public function __construct(ParentDepartmentCreatorService $parentDepartmentCreator)
    {
        $this->parentDepartmentCreator = $parentDepartmentCreator;
    }

    public function handle(ParentDepartmentCreateCommand $parentDepartmentCreateCommand)
    {
        $this->parentDepartmentCreator->__invoke(new ParentDepartment($parentDepartmentCreateCommand->name()));
    }
}