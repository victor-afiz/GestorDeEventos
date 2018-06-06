<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 8:58
 */

namespace App\Application\ClotheCategory\Update;

use App\Domain\Services\ClotheCategory\ClotheCategoryUpdaterService;

class ClotheCategoryUpdate
{
    private $repository;

    public function __construct(ClotheCategoryUpdaterService $clotheCategoryUpdaterService)
    {
        $this->repository = $clotheCategoryUpdaterService;
    }

    public function handle(ClotheCategoryUpdateCommand $DepartmentUpdateCommand)
    {
        $this->repository->__invoke($DepartmentUpdateCommand->id(), $DepartmentUpdateCommand->name());
    }
}