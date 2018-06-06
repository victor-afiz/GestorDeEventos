<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:49
 */

namespace App\Domain\Model\ClotheSizeStock;


use App\Domain\Model\Clothe\Clothe;

interface ClotheSizeStockRepository
{
    /**
     * @param ClotheSizeStock $clotheSizeStock
     * @return mixed
     */
    public function insert(ClotheSizeStock $clotheSizeStock);

    /**
     * @return mixed
     */
    public function updateAll();

    /**
     * @param $clotheId
     * @return mixed
     */
    public function givMeAllSizeClotheStock($clotheId);

    /**
     * @param $clotheId
     * @return mixed
     */
    public function givMeAllStock($clotheId);
}