<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 14:17
 */

namespace App\Application\Manager\Delete;


use App\Domain\Services\Manager\ManagerDeletorService;

class ManagerDelete
{
    private $managerDeletorService;

    public function __construct(ManagerDeletorService $managerDeletorService)
    {
        $this->managerDeletorService = $managerDeletorService;
    }

    /**
     * @param ManagerDeleteCommand $managerCreateCommand
     * @throws \Assert\AssertionFailedException
     */
    public function handle(ManagerDeleteCommand $managerCreateCommand)
    {
        $this->managerDeletorService->__invoke($managerCreateCommand->id());
    }
}