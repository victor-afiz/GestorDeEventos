<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 10:06
 */

namespace App\Domain\Services\Manager;


use App\Application\Manager\Update\ManagerUpdateCommand;
use App\Domain\Model\Manager\Manager;

class ManagerSetAllParamsService
{
    /**
     * @param Manager $manager
     * @param Manager $newManager
     * @throws \Assert\AssertionFailedException
     */
    static function execute(Manager $manager, ManagerUpdateCommand $newManager): Manager
    {
        $manager->setEmail($newManager->email());
        $manager->setRol($newManager->rol());
        $manager->setNickName($newManager->nickName());
        $manager->setPassword($newManager->password());
        $manager->setPhoto($newManager->photo());
        $manager->setName($newManager->name());

        return $manager;
    }
}