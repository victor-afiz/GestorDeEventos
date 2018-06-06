<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 14:31
 */

namespace App\Domain\Services\Manager;


use App\Application\Manager\Delete\ManagerDeleteCommand;
use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\Manager\Exceptions\ManagerWithIdDoesntExistsException;
use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;
use Ramsey\Uuid\Uuid;

class ManagerDeletorService
{
    /**
     * @var ManagerRepository
     */
    private $repository;

    /**
     * @var DeleteThingRepository
     */
    private $deleteThingRepository;


    public function __construct(ManagerRepository $managerRepository, DeleteThingRepository $deleteThingRepository)
    {
        $this->repository = $managerRepository;
        $this->deleteThingRepository = $deleteThingRepository;
    }

    /**
     * @param $id
     * @throws \Assert\AssertionFailedException
     */
    public function __invoke($id)
    {
        $oldManager = $this->repository->getManagerByID($id);

        if (empty($oldManager))
            throw new ManagerWithIdDoesntExistsException($id);

        $uuid = Uuid::uuid4();

        $oldManager->setDeleteID($uuid);

        $this->deleteThingRepository->insert(new DeleteThing($id, $uuid->toString(), 'Manager'));
        $this->repository->update();
    }
}