<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 13:00
 */

namespace App\Infrastructure\Controller;

use App\Application\ClotheCategory\Create\ClotheCategoryCreateCommand;
use App\Application\ClotheCategory\Update\ClotheCategoryUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClotheCategoryController
{
    public function createClotheCategory(Request $request, CommandBus $commandBus)
    {
        $newReq = json_decode($request->getContent());

        $commandBus->handle(new ClotheCategoryCreateCommand($newReq->name, $newReq->typeSizeName));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateClotheCategory(Request $request, CommandBus $commandBus)
    {
        $newReq = json_decode($request->getContent());

        $commandBus->handle(new ClotheCategoryUpdateCommand($newReq->id, $newReq->name));

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }
}