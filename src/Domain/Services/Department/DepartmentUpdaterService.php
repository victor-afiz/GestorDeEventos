<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 10:13
 */

namespace App\Domain\Services\Department;

use App\Domain\Model\Department\Department;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\Department\Exceptions\DepartmentAlreadyExistsException;
use App\Domain\Model\Department\Exceptions\DepartmentDoesntExistException;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentDosentExistsException;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;

class DepartmentUpdaterService
{
    /**
     * @var DepartmentRepository
     */
    private $repository;

    /**
     * @var ParentDepartmentRepository
     */
    private $parentDepartmentRepository;

    public function __construct(DepartmentRepository $departmentRepository, ParentDepartmentRepository $parentDepartmentRepository)
    {
        $this->repository = $departmentRepository;
        $this->parentDepartmentRepository = $parentDepartmentRepository;
    }


    public function __invoke($id, Department $newDepartment)
    {
        $oldDepartment = $this->repository->findById($id);

        if (empty($oldDepartment))
            throw new DepartmentDoesntExistException($id);

        if ($newDepartment->getName() !== $oldDepartment->getName()) {
            $departmentName = $this->repository->findByName($newDepartment->getName());

            if (false === empty($departmentName))
                throw new DepartmentAlreadyExistsException($newDepartment->getName());
        }

        $parentDepartment = $this->parentDepartmentRepository->getParentDepartmentByID($newDepartment->getParentDepartmentID());

        if (empty($parentDepartment))
            throw new ParentDepartmentDosentExistsException($oldDepartment->getParentDepartmentID());

        $oldDepartment->setName($newDepartment->getName());
        $oldDepartment->setParentDepartmentID($newDepartment->getParentDepartmentID());

        $this->repository->update();
    }
}