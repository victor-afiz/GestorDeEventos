<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:43
 */

namespace App\Domain\Services\Manager;


use App\Domain\Model\Manager\Exceptions\ManagerEmailAlreadyExistsException;
use App\Domain\Model\Manager\ManagerRepository;

class ManagerCheckEmailService
{
    private $repository;

    public function __construct(ManagerRepository $managerRepository)
    {
        $this->repository = $managerRepository;
    }

    public function __invoke($email)
    {
        $manager = $this->repository->getManagerByEmail($email);

        if (null !== $manager)
            throw new ManagerEmailAlreadyExistsException($email);
    }
}