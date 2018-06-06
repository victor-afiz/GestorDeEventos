<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:52
 */

namespace App\Domain\Model\Department;


interface DepartmentRepository
{
    public function insert(Department $department): void;
    public function findByName($name);
    public function findById($id);
    public function update();
}