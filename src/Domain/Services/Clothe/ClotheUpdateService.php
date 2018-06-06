<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 17/05/18
 * Time: 9:51
 */

namespace App\Domain\Services\Clothe;

use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\Clothe\ClotheRepository;
use App\Domain\Model\Clothe\Exceptions\ClotheIdDoesntExistException;
use App\Domain\Model\Clothe\Exceptions\ClotheNameAlreadyExistsException;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCategoryDoesntExistException;
use App\Domain\Model\Gender\Exceptions\GenderNotFoundException;
use App\Domain\Model\Gender\Gender;

class ClotheUpdateService
{
    private $repository;
    private $clotheCategoryRepository;
    private $clotheSetAllParams;

    public function __construct(ClotheRepository $clotheRepository ,ClotheCategoryRepository $clotheCategoryRepository, ClotheSetAllParamsService $clotheSetAllParams)
    {
        $this->repository = $clotheRepository;
        $this->clotheCategoryRepository = $clotheCategoryRepository;
        $this->clotheSetAllParams = $clotheSetAllParams;
    }

    public function __invoke(Clothe $clothe)
    {
        $oldClothe = $this->repository->findById($clothe->getId());

        if (empty($oldClothe))
            throw new ClotheIdDoesntExistException($clothe->getId());

        $clotheCategory = $this->clotheCategoryRepository->findById($clothe->getClotheCategoryId());

        if (empty($clotheCategory))
            throw new ClotheCategoryDoesntExistException($clothe->getClotheCategoryId());

        if ($clothe->getName() !== $oldClothe->getName()){
            $clotheName = $this->repository->findByName($clothe->getName());

            if (false === empty($clotheName))
                throw new ClotheNameAlreadyExistsException($clothe->getName());
        }

        if (false === in_array($clothe->getGender(),Gender::GENDER))
            throw new GenderNotFoundException($clothe->getGender());

        $this->clotheSetAllParams->execute($oldClothe, $clothe, $clotheCategory, $this->clotheCategoryRepository->findById($oldClothe->getClotheCategoryId()));

        $this->repository->updateAll();
    }
}