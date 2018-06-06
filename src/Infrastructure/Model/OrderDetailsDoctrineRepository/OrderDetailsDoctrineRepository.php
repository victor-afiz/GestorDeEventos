<?php

namespace App\Infrastructure\Model\OrderDetailsDoctrineRepository;

use App\Domain\Model\OrderDetails\OrderDetails;
use App\Domain\Model\OrderDetails\OrderDetailsRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method OrderDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderDetails[]    findAll()
 * @method OrderDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderDetailsDoctrineRepository extends EntityRepository implements OrderDetailsRepository
{

//    /**
//     * @return OrderEntity[] Returns an array of OrderEntity objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderEntity
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
