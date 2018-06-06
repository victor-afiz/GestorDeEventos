<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 10:03
 */

namespace App\Application\Department\Update;


use App\Domain\Model\Department\Department;
use App\Domain\Services\Department\DepartmentUpdaterService;

class DepartmentUpdate
{
    private $repository;

    public function __construct(DepartmentUpdaterService $departmentUpdaterService)
    {
        $this->repository = $departmentUpdaterService;
    }

    public function handle(DepartmentUpdateCommand $updateCommand)
    {
        $this->repository->__invoke($updateCommand->id(), new Department($updateCommand->parentId(), $updateCommand->name()));
    }
}