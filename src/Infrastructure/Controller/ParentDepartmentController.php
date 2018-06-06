<?php

namespace App\Infrastructure\Controller;

use App\Application\ParentDepartment\Create\ParentDepartmentCreateCommand;
use App\Application\ParentDepartment\Update\ParentDepartmentUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ParentDepartmentController
{
    public function createParentDepartment(Request $request, CommandBus $commandBus)
    {
        $newReq = json_decode($request->getContent());

        $commandBus->handle(new ParentDepartmentCreateCommand($newReq->name));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateParentDepartment(Request $request, CommandBus $commandBus)
    {
        $newReq = json_decode($request->getContent());

        $commandBus->handle(new ParentDepartmentUpdateCommand($newReq->id, $newReq->name));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }
}