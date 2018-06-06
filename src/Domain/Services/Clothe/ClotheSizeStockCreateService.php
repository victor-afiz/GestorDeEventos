<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 13:50
 */

namespace App\Domain\Services\Clothe;

use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStock;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStockRepository;
use App\Domain\Model\Sizes\Sizes;

class ClotheSizeStockCreateService
{
    private $clotheSizeStockRepository;
    private $clotheCategoryRepository;

    public function __construct(ClotheSizeStockRepository $clotheSizeStockRepository, ClotheCategoryRepository $clotheCategoryRepository)
    {
        $this->clotheSizeStockRepository = $clotheSizeStockRepository;
        $this->clotheCategoryRepository = $clotheCategoryRepository;
    }

    public function execute(Clothe $clothe)
    {
        $clotheCategory = $this->clotheCategoryRepository->findById($clothe->getClotheCategoryId());

        $arraySizes = Sizes::GET_ARRAY_SIZE[$clotheCategory->getSizeTypeName()];

        foreach ($arraySizes as $size) {
            $this->clotheSizeStockRepository->insert(new ClotheSizeStock($clothe->getId(), $size));
        }
    }
}