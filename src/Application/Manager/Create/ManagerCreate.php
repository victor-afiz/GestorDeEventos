<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:52
 */

namespace App\Application\Manager\Create;


use App\Domain\Model\Manager\Manager;
use App\Domain\Services\Manager\ManagerCreatorService;

class ManagerCreate
{
    private $managerCreatorService;

    public function __construct(ManagerCreatorService $managerCreatorService)
    {
        $this->managerCreatorService = $managerCreatorService;
    }

    public function handle(ManagerCreateCommand $managerCreateCommand)
    {
        $manager = new Manager( $managerCreateCommand->nickName(),
                                $managerCreateCommand->name(),
                                $managerCreateCommand->rolID(),
                                $managerCreateCommand->password(),
                                $managerCreateCommand->email()
        );
        $manager->setPhoto($managerCreateCommand->photo());

        $this->managerCreatorService->__invoke($manager);
    }
}