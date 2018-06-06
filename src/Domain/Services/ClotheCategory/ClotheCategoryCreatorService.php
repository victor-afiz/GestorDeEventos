<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 13:00
 */

namespace App\Domain\Services\ClotheCategory;


use App\Domain\Model\ClotheCategory\ClotheCategory;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCategoryAlreadyExistsException;
use App\Domain\Model\SizeType\Exceptions\SizeTypeDosentExistException;
use App\Domain\Model\SizeType\SizeType;

class ClotheCategoryCreatorService
{
    /**
     * @var ClotheCategory
     */
    private $clotheCategoryRepository;

    public function __construct(ClotheCategoryRepository $clotheCategoryRepository)
    {
        $this->clotheCategoryRepository = $clotheCategoryRepository;
    }

    public function __invoke(ClotheCategory $clotheCategory)
    {

        if (false === in_array($clotheCategory->getSizeTypeName(), SizeType::SIZE_TYPE))
            throw new SizeTypeDosentExistException($clotheCategory->getSizeTypeName());

        if ($this->clotheCategoryRepository->findByName($clotheCategory->getName()))
            throw new ClotheCategoryAlreadyExistsException($clotheCategory->getName());

        $this->clotheCategoryRepository->insert($clotheCategory);
        $this->clotheCategoryRepository->update();
    }
}