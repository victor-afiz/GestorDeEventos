<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 17/05/18
 * Time: 12:43
 */

namespace App\Domain\Services\ClotheCategory;


use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\Clothe\Exceptions\ClotheICanNotUpdateBecauseHaveStockException;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStockRepository;
use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Services\Clothe\ClotheSizeStockCreateService;
use Ramsey\Uuid\Uuid;

class DeleteAndCreateClotheCategoryService
{
    /**
     * @var ClotheSizeStockRepository
     */
    private $clotheSizeStockRepository;

    /**
     * @var ClotheSizeStockCreateService
     */
    private $clotheSizeStockCreate;

    /**
     * @var DeleteThingRepository
     */
    private $deleteThingRepository;

    public function __construct(ClotheSizeStockRepository $clotheSizeStockRepository, ClotheSizeStockCreateService $clotheSizeStockCreate, DeleteThingRepository $deleteThingRepository)
    {
        $this->clotheSizeStockRepository = $clotheSizeStockRepository;
        $this->clotheSizeStockCreate = $clotheSizeStockCreate;
        $this->deleteThingRepository = $deleteThingRepository;
    }

    public function execute(Clothe $clothe)
    {

        if (0 != $this->clotheSizeStockRepository->givMeAllStock($clothe->getId()))
            throw new ClotheICanNotUpdateBecauseHaveStockException($clothe->getId());

        $arrayClotes = $this->clotheSizeStockRepository->givMeAllSizeClotheStock($clothe->getId());

        $uid = Uuid::uuid4();

        $delete = new DeleteThing('Varios', $uid, 'ClotheSizeStock');
        $delete->setDescription('Se han eliminado por que se cambio de clothe category y tienen distinto tallaje');

        $this->deleteThingRepository->insert($delete);

        foreach ($arrayClotes as $cloteSizeStock) {
            $cloteSizeStock->setDeleteId($uid);
        }

        $this->clotheSizeStockCreate->execute($clothe);

    }

}