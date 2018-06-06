<?php

namespace App\Infrastructure\Model\ClotheCategoryDoctrineRepository;

use App\Domain\Model\ClotheCategory\ClotheCategory;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method ClotheCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClotheCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClotheCategory[]    findAll()
 * @method ClotheCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheCategoryDoctrineRepository extends EntityRepository implements ClotheCategoryRepository
{
    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(ClotheCategory $clotheCategory): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($clotheCategory);
    }

    public function findByName($name)
    {
        return $this->findOneBy(['name' => $name, 'deleteID' => null]);
    }

    public function findById($id)
    {
        return $this->findOneBy(["id" => $id, 'deleteID' => null]);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update()
    {
        $this->getEntityManager()->flush();
    }
}
