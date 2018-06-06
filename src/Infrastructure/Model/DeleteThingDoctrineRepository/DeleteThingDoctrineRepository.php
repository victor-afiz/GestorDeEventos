<?php

namespace App\Infrastructure\Model\DeleteThingDoctrineRepository;

use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use Doctrine\ORM\EntityRepository;
use Ramsey\Uuid\Uuid;


/**
 * @method DeleteThing|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeleteThing|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeleteThing[]    findAll()
 * @method DeleteThing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeleteThingDoctrineRepository extends EntityRepository implements DeleteThingRepository
{
    /**
     * @param DeleteThing $deleteThing
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(DeleteThing $deleteThing): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($deleteThing);
    }
}
