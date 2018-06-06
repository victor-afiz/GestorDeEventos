<?php


namespace App\Domain\Services\ClotheCategory;

use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCategoryAlreadyExistsException;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCategoryDoesntExistException;


class ClotheCategoryUpdaterService
{

    private $repository;

    public function __construct(ClotheCategoryRepository $clotheCategoryRepository)
    {
        $this->repository = $clotheCategoryRepository;
    }


    public function __invoke($id, $name)
    {
        $clotheCategory = $this->repository->findById($id);

        if (empty($clotheCategory))
            throw new ClotheCategoryDoesntExistException($id);

        $clotheCategoryName = $this->repository->findByName($name);

        if (false === empty($clotheCategoryName))
            throw new ClotheCategoryAlreadyExistsException($name);

         $clotheCategory->setName($name);

         $this->repository->update();
    }
}