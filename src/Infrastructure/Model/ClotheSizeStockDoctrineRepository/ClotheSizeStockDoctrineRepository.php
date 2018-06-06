<?php

namespace App\Infrastructure\Model\ClotheSizeStockDoctrineRepository;

use App\Domain\Model\ClotheSizeStock\ClotheSizeStock;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStockRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method ClotheSizeStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClotheSizeStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClotheSizeStock[]    findAll()
 * @method ClotheSizeStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheSizeStockDoctrineRepository extends EntityRepository implements ClotheSizeStockRepository
{


    /**
     * @param ClotheSizeStock $clotheSizeStock
     * @return mixed|void
     * @throws \Doctrine\ORM\ORMException
     */
    public function insert(ClotheSizeStock $clotheSizeStock)
    {
        $this->getEntityManager()->persist($clotheSizeStock);
    }

    /**
     * @return mixed|void
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateAll()
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param $clotheId
     */
    public function givMeAllSizeClotheStock($clotheId)
    {
        return $this->findBy(['clotheID' => $clotheId, 'deleteID' => null]);
    }

    /**
     * @param $clotheId
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function givMeAllStock($clotheId)
    {
        return $this->createQueryBuilder('fc')
            ->andWhere('fc.clotheID = :clotheId')
            ->setParameter('clotheId', $clotheId)
            ->select('SUM(fc.stock) as stock')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
