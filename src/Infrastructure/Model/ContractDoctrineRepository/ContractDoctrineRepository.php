<?php

namespace App\Infrastructure\Model\ContractDoctrineRepository;

use App\Domain\Model\Contract\Contract;
use App\Domain\Model\Contract\ContractRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method Contract|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contract|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contract[]    findAll()
 * @method Contract[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContractDoctrineRepository extends EntityRepository implements ContractRepository
{

    /**
     * @param Contract $contract
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(Contract $contract): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($contract);
    }

    public function findByEndDate($endDate)
    {
        return $this->findOneBy(['endDate' => $endDate, 'deleteID' => null]);
    }

    public function findByRenovation($renovation)
    {
        return $this->findOneBy(['renovation' => $renovation, 'deleteID' => null]);
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

    public function findByUserId($id)
    {
        return $this->findOneBy(['userID' => $id, 'deleteID' => null]);
    }
}
