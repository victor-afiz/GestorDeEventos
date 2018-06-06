<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:50
 */

namespace App\Domain\Model\Contract;


interface ContractRepository
{
    public function insert(Contract $contract): void;
    public function findByEndDate($endDate);
    public function findByRenovation($renovation);
    public function findById($id);
    public function updateAll();
    public function findByUserId($id);
}