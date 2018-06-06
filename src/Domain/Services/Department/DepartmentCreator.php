<?php

namespace App\Domain\Services\Department;


use App\Domain\Model\Department\Department;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\Department\Exceptions\DepartmentAlreadyExistsException;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentDosentExistsException;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;

class DepartmentCreator
{
    private $repository;
    private $parentRepository;

    public function __construct(ParentDepartmentRepository $parentDepartmentRepository, DepartmentRepository $departmentRepository)
    {
        $this->parentRepository = $parentDepartmentRepository;
        $this->repository = $departmentRepository;
    }

    public function __invoke(Department $department)
    {
        $parentDepartment = $this->parentRepository->getParentDepartmentByID($department->getParentDepartmentID());

        if (empty($parentDepartment))
            throw new ParentDepartmentDosentExistsException($department->getParentDepartmentID());

        if(null == empty($this->repository->findByName($department->getName())))
            throw new DepartmentAlreadyExistsException($department->getName());

        $this->repository->insert($department);
        $this->repository->update();
    }
}