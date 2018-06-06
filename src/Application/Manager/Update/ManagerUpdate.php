<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:52
 */

namespace App\Application\Manager\Update;

use App\Domain\Services\Manager\ManagerUpdatorService;

class ManagerUpdate
{
    private $managerUpdatorService;

    public function __construct(ManagerUpdatorService $managerUpdatorService)
    {
        $this->managerUpdatorService = $managerUpdatorService;
    }

    /**
     * @param ManagerUpdateCommand $managerUpdateCommand
     * @throws \Assert\AssertionFailedException
     */
    public function handle(ManagerUpdateCommand $managerUpdateCommand)
    {
        $this->managerUpdatorService->__invoke($managerUpdateCommand);
    }
}