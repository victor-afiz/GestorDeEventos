<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 17/05/18
 * Time: 9:50
 */

namespace App\Application\Clothe\Update;


use App\Domain\Model\Clothe\Clothe;
use App\Domain\Services\Clothe\ClotheUpdateService;

class ClotheUpdate
{
    private $clotheUpdate;

    public function __construct(ClotheUpdateService $clotheUpdate)
    {
        $this->clotheUpdate = $clotheUpdate;
    }

    public function handler(ClotheUpdateCommand $clotheUpdateCommand)
    {
        $clothe = new Clothe($clotheUpdateCommand->getId(),$clotheUpdateCommand->getClotheCategoryID(),$clotheUpdateCommand->getName(),$clotheUpdateCommand->getGender(),$clotheUpdateCommand->getPhoto(),$clotheUpdateCommand->getDescription());
        $this->clotheUpdate->__invoke($clothe);
    }
}