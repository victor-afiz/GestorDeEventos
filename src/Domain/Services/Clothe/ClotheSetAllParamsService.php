<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 17/05/18
 * Time: 10:37
 */

namespace App\Domain\Services\Clothe;


use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\ClotheCategory\ClotheCategory;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Services\ClotheCategory\DeleteAndCreateClotheCategoryService;
use App\Domain\Services\ClotheCategory\DeleteAndCreateClotheCategorySevice;

class ClotheSetAllParamsService
{
    private $andCreateClotheCategoryService;

    public function __construct(DeleteAndCreateClotheCategoryService $andCreateClotheCategoryService)
    {
        $this->andCreateClotheCategoryService = $andCreateClotheCategoryService;
    }

    public function execute(Clothe $oldClothe,Clothe $newClothe, ClotheCategory $newClotheCategory, ClotheCategory $oldClotheCategory)
    {

        $oldClothe->setName($newClothe->getName());
        $oldClothe->setClotheCategoryId($newClothe->getClotheCategoryId());
        $oldClothe->setGenderId($newClothe->getGender());
        $oldClothe->setPhoto($newClothe->getPhoto());
        $oldClothe->setDescription($newClothe->getDescription());

        if ($newClotheCategory->getSizeTypeName() != $oldClotheCategory->getSizeTypeName())
            $this->andCreateClotheCategoryService->execute($oldClothe);


    }
}