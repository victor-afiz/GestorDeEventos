<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:28
 */

namespace App\Infrastructure\Controller;

use App\Application\Manager\CheckEmail\ManagerCheckEmailCommand;
use App\Application\Manager\CheckNickName\ManagerCheckNickNameCommand;
use App\Application\Manager\Create\ManagerCreateCommand;
use App\Application\Manager\Delete\ManagerDeleteCommand;
use App\Application\Manager\GetAll\ManagerGetAllCommand;
use App\Application\Manager\Update\ManagerUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class ManagerController
{
    public function checkNickName(Request $request, CommandBus $commandBus)
    {
        $nickName = $request->query->get('nickName');

        $commandBus->handle(new ManagerCheckNickNameCommand($nickName));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function checkEmail(Request $request, CommandBus $commandBus)
    {
        $email= $request->query->get('email');

        $commandBus->handle(new ManagerCheckEmailCommand($email));

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    public function createManager(Request $request, CommandBus $commandBus)
    {
//        $r = json_decode($request->request->get('nickName'));
////        $porciones = explode(",", $r);
////        $a = [];
////        foreach ($porciones as $value ) {
////            $t = explode(">", $value);
////            $a[$t[0]] = $t[1];
////        }
//        return new JsonResponse($r->e[4],MyOwnHttpCodes::HTTP_OK);
//        dump($a);
//        die;
//
//        dump($request);
//
//        die;


        $newReq = json_decode($request->getContent());

        $commandBus->handle(new ManagerCreateCommand(
                                                    $newReq->nickName,
                                                    $newReq->name,
                                                    $newReq->photo,
                                                    $newReq->rolID,
                                                    $newReq->password,
                                                    $newReq->email)
        );

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function updateManager(Request $request, CommandBus $commandBus)
    {
        $newReq = json_decode($request->getContent());

        $commandBus->handle(new ManagerUpdateCommand(
                                                    $newReq->id,
                                                    $newReq->nickName,
                                                    $newReq->nacosoleme,
                                                    $newReq->photo,
                                                    $newReq->rolID,
                                                    $newReq->password,
                                                    $newReq->email
                            )
        );

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function deleteManager(Request $request, CommandBus $commandBus)
    {
        $newReq = json_decode($request->getContent());

        $commandBus->handle(new ManagerDeleteCommand($newReq->id));

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public function getAllManager(CommandBus $commandBus)
    {
        return new JsonResponse($commandBus->handle(new ManagerGetAllCommand()),MyOwnHttpCodes::HTTP_OK);
    }
}