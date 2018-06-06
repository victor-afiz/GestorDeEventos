<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:55
 */

namespace App\Domain\Model\Manager;


interface ManagerRepository
{
    /**
     * @param string $nickName
     * @return Manager
     */
    public function getManagerByName($nickName);

    /**
     * @param string $email
     * @return Manager
     */
    public function getManagerByEmail($email);

    /**
     * @param Manager $manager
     */
    public function insert(Manager $manager);

    /**
     * @param string $id
     * @return Manager
     */
    public function getManagerByID($id);

    public function update(): void;
    public function getAll($rol);
}