<?php

namespace App\Application\ParentDepartment\Update;

use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Services\ParentDepartment\ParentDepartmentUpdaterService;

class ParentDepartmentUpdate
{
    private $repository;

    public function __construct(ParentDepartmentUpdaterService $departmentUpdaterService)
    {
        $this->repository = $departmentUpdaterService;
    }

    public function handle(ParentDepartmentUpdateCommand $parentDepartmentUpdateCommand)
    {
        $id = $parentDepartmentUpdateCommand->id();
        $name = $parentDepartmentUpdateCommand->name();

        $this->repository->__invoke($id , $name);
    }
}