<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:56
 */

namespace App\Domain\Services\Manager;


use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Model\Role\Exceptions\RolNotFoundException;
use App\Domain\Model\Role\Role;

class ManagerCreatorService
{
    private $repository;
    /**
     * @var ManagerCheckNickNameService
     */
    private $checkNickName;
    /**
     * @var ManagerCheckEmailService
     */
    private $checkEmail;


    public function __construct(ManagerRepository $managerRepository, ManagerCheckNickNameService $checkNickName, ManagerCheckEmailService $checkEmail)
    {
        $this->repository = $managerRepository;
        $this->checkNickName = $checkNickName;
        $this->checkEmail = $checkEmail;
    }

    public function __invoke(Manager $manager)
    {
        $this->checkEmail->__invoke($manager->getEmail());
        $this->checkNickName->__invoke($manager->getNickName());

        if (false === in_array($manager->getRol(), Role::ROLES))
            throw new RolNotFoundException($manager->getRol());

        $this->repository->insert($manager);
        $this->repository->update();
    }
}