<?php

namespace App\Infrastructure\Model\LogManagerDoctrineRepository;

use App\Domain\Model\LogManager\LogManager;
use App\Domain\Model\LogManager\LogManagerRepository;
use Doctrine\ORM\EntityRepository;

/**
 * @method LogManager|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogManager|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogManager[]    findAll()
 * @method LogManager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogManagerDoctrineRepository extends EntityRepository implements LogManagerRepository
{

//    /**
//     * @return LogManager[] Returns an array of LogManager objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LogManager
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
