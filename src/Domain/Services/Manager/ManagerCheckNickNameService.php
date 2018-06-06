<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:43
 */

namespace App\Domain\Services\Manager;


use App\Domain\Model\Manager\Exceptions\ManagerNickNameAlreadyExistsException;
use App\Domain\Model\Manager\ManagerRepository;

class ManagerCheckNickNameService
{
    private $repository;

    public function __construct(ManagerRepository $managerRepository)
    {
        $this->repository = $managerRepository;
    }

    public function __invoke($nickName)
    {
        $manager = $this->repository->getManagerByName($nickName);

        if (false == empty($manager))
            throw new ManagerNickNameAlreadyExistsException($nickName);
    }
}