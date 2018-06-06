<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 12:02
 */

namespace App\Infrastructure\Controller;


use App\Application\Contract\Create\ContractCreate;
use App\Application\Contract\Create\ContractCreateCommand;
use App\Application\Contract\Update\ContractUpdate;
use App\Application\Contract\Update\ContractUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ContractController
{
    public function createContract(Request $request, CommandBus $commandBus)
    {
        $newReq = json_decode($request->getContent());

        $commandBus->handle(new ContractCreateCommand(  $newReq->id,
                                                        $newReq->endDate,
                                                        $newReq->renovation,
                                                        $newReq->startDate));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateContract(Request $request, CommandBus $commandBus)
    {
        $newReq = json_decode($request->getContent());

        $commandBus->handle(new ContractUpdateCommand(  $newReq->id,
                                                        $newReq->endDate,
                                                        $newReq->renovation,
                                                        $newReq->startDate));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }
}