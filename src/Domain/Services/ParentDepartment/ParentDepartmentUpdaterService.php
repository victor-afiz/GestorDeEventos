<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:51
 */

namespace App\Domain\Services\ParentDepartment;


use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentAlreadyExistsException;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentDosentExistsException;
use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;

class ParentDepartmentUpdaterService
{
    /**
     * @var ParentDepartment
     */
    private $parent;
    private $repository;

    public function __construct(ParentDepartmentRepository $departmentRepository)
    {
        $this->repository = $departmentRepository;
    }

    public function __invoke($id, $name)
    {
        $this->parent = $this->repository->getParentDepartmentByID($id);

        if(empty($this->parent))
            throw new ParentDepartmentDosentExistsException($id);

        if(false === $this->parent->isNotDeleted())
            throw new ParentDepartmentDosentExistsException($id);

        $parentName = $this->repository->findByName($name);

        if (false === empty($parentName))
            throw new ParentDepartmentAlreadyExistsException($name);

        $this->parent->setName($name);

        $this->repository->updateAll();
    }
}