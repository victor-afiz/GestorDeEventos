<?php

namespace App\Infrastructure\Model\ManagerDoctrineRepository;

use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method Manager|null find($id, $lockMode = null, $lockVersion = null)
 * @method Manager|null findOneBy(array $criteria, array $orderBy = null)
 * @method Manager[]    findAll()
 * @method Manager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManagerDoctrineRepository extends EntityRepository implements ManagerRepository
{
    public function getManagerByName($nickName)
    {
        return $this->findOneBy(['nickName' => $nickName, 'deleteID' => null]);
    }

    public function getManagerByEmail($email)
    {
        return $this->findOneBy(['email' => $email, 'deleteID' => null]);
    }

    /**
     * @param Manager $manager
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(Manager $manager)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($manager);
    }

    /**
     * @param string $id
     * @return Manager
     */
    public function getManagerByID($id)
    {
        return $this->findOneBy(['id' => $id, 'deleteID' => null]);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(): void
    {
        $this->getEntityManager()->flush();
    }

    public function getAll($rol)
    {
        return $this->findBy(['deleteID' => null, 'rol' => $rol]);
    }
}
