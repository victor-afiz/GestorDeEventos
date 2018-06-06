<?php

namespace App\Domain\Model\ClotheCategory;

interface ClotheCategoryRepository
{
    public function insert(ClotheCategory $clotheCategory): void;
    public function findByName($name);
    public function findById($id);
    public function update();
}