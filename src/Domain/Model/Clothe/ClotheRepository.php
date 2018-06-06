<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 15:28
 */

namespace App\Domain\Model\Clothe;


interface ClotheRepository
{
    public function insert(Clothe $clothe): void;
    public function findByName($name);
    public function findById($id);
    public function updateAll();
}