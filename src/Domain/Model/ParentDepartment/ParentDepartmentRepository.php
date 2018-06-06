<?php

namespace App\Domain\Model\ParentDepartment;

interface ParentDepartmentRepository
{
    public function insert(ParentDepartment $parentDepartment): void;
    public function getParentDepartmentByID($id);
    public function findByName($name);
    public function updateAll();
}