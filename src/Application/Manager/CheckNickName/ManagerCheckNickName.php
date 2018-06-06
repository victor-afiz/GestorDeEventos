<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:42
 */

namespace App\Application\Manager\CheckNickName;


use App\Domain\Services\Manager\ManagerCheckNickNameService;

class ManagerCheckNickName
{
    private $checkNickName;

    public function __construct(ManagerCheckNickNameService $checkNickName)
    {
        $this->checkNickName = $checkNickName;
    }

    public function handle(ManagerCheckNickNameCommand $checkManagerNickNameCommand)
    {
        $this->checkNickName->__invoke($checkManagerNickNameCommand->getNickName());
    }
}