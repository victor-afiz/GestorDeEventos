<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 27/04/18
 * Time: 14:17
 */

namespace App\Infrastructure\Controller;

use App\Application\Role\AllRoles\RoleAllCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;

class RoleController
{
    public function all(CommandBus $commandBus)
    {
        return new JsonResponse($commandBus->handle(new RoleAllCommand()),MyOwnHttpCodes::HTTP_OK);
    }
}