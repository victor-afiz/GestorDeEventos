<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:22
 */

namespace App\Domain\Services\ParentDepartment;

use App\Domain\Model\Department\Exceptions\ParentDepartmentDoesntExistException;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentAlreadyExistsException;
use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;

class ParentDepartmentCreatorService
{
    private $repository;

    public function __construct(ParentDepartmentRepository $parentDepartmentRepository)
    {
        $this->repository = $parentDepartmentRepository;
    }

    public function __invoke(ParentDepartment $parentDepartment)
    {
        if(null == empty($this->repository->findByName($parentDepartment->getName())))
            throw new ParentDepartmentAlreadyExistsException($parentDepartment->getName());

        $this->repository->insert($parentDepartment);
    }
}