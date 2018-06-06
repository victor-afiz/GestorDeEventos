<?php

namespace App\Infrastructure\Model\UserDoctrineRepository;

use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserDoctrineRepository extends EntityRepository implements UserRepository
{


    public function findByID($id)
    {

        return $this->findOneBy(['id' => $id , 'deleteID' =>null]);
    }
}
