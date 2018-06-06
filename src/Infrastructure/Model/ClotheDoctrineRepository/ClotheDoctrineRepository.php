<?php

namespace App\Infrastructure\Model\ClotheDoctrineRepository;


use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\Clothe\ClotheRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method Clothe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clothe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clothe[]    findAll()
 * @method Clothe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheDoctrineRepository extends EntityRepository implements ClotheRepository
{

    /**
     * @param Clothe $clothe
     * @throws \Doctrine\ORM\ORMException
     */
    public function insert(Clothe $clothe): void
    {
        $this->getEntityManager()->persist($clothe);
    }

    public function findByName($name)
    {
        return $this->findOneBy(['name' => $name, 'deleteID' => null]);
    }

    public function findById($id)
    {
        return $this->findOneBy(['id' => $id, 'deleteID' => null]);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateAll()
    {
        $this->getEntityManager()->flush();
    }
}
