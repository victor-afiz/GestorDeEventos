<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 12:58
 */

namespace App\Application\ClotheCategory\Create;


use App\Domain\Model\ClotheCategory\ClotheCategory;
use App\Domain\Services\ClotheCategory\ClotheCategoryCreatorService;

class ClotheCategoryCreate
{
    private $clotheCategoryCreatorService;

    public function __construct(ClotheCategoryCreatorService $clotheCategoryCreatorService)
    {
        $this->clotheCategoryCreatorService = $clotheCategoryCreatorService;
    }

    public function handle(ClotheCategoryCreateCommand $clotheCategoryCreateCommand)
    {
        $this->clotheCategoryCreatorService->__invoke(new ClotheCategory($clotheCategoryCreateCommand->name(), $clotheCategoryCreateCommand->typeSizeName()));
    }
}