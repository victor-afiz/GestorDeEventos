<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 12:12
 */

namespace App\Infrastructure\Controller;


use App\Application\Clothe\Creator\ClotheCreate;
use App\Application\Clothe\Creator\ClotheCreateCommand;
use App\Application\Clothe\Update\ClotheUpdate;
use App\Application\Clothe\Update\ClotheUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClotheController
{
    private $clotheCreate;
    private $clotheUpdate;

    public function __construct(ClotheCreate $clotheCreate ,ClotheUpdate $clotheUpdate)
    {
        $this->clotheCreate = $clotheCreate;
        $this->clotheUpdate = $clotheUpdate;
    }

    public function createClothe(Request $request)
    {
        $id = $request->query->get('id');
        $clotheCategoryID = $request->query->get('clotheCategory');
        $name = $request->query->get('name');
        $gender = $request->query->get('gender');
        $photo = $request->query->get('photo');
        $description = $request->query->get('description');

        $clotheCreateCommand = new ClotheCreateCommand($id,$clotheCategoryID,$name,$gender,$photo,$description);
        $this->clotheCreate->handler($clotheCreateCommand);

        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }

    public function updateClothe(Request $request)
    {
        $id = $request->query->get('id');
        $clotheCategoryID = $request->query->get('clotheCategory');
        $name = $request->query->get('name');
        $gender = $request->query->get('gender');
        $photo = $request->query->get('photo');
        $description = $request->query->get('description');

        $clotheUpdateCommand = new ClotheUpdateCommand($id,$clotheCategoryID,$name,$gender,$photo,$description);
        $this->clotheUpdate->handler($clotheUpdateCommand);

        return new JsonResponse([], MyOwnHttpCodes::HTTP_OK);
    }
}