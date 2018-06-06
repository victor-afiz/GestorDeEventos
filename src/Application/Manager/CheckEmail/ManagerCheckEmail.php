<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 8:15
 */

namespace App\Application\Manager\CheckEmail;


use App\Domain\Services\Manager\ManagerCheckEmailService;

class ManagerCheckEmail
{
    private $checkEmail;

    public function __construct(ManagerCheckEmailService $checkEmail)
    {
        $this->checkEmail = $checkEmail;
    }

    public function handle(ManagerCheckEmailCommand $managerCheckEmailCommand)
    {
        $this->checkEmail->__invoke($managerCheckEmailCommand->email());
    }
}