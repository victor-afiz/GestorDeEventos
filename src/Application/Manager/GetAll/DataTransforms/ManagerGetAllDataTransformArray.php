<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 10:15
 */

namespace App\Application\Manager\GetAll\DataTransforms;


use App\Application\Manager\GetAll\ManagerGetAllDataTransform;

class ManagerGetAllDataTransformArray implements ManagerGetAllDataTransform
{
    public function transform($managers)
    {
        $arrayManagers = [];
        foreach ($managers as $manager){
            $arrayManagers[] = [
                "ID" => $manager->getId(),
                "NickName" => $manager->getNickName(),
                "Email" => $manager->getEmail(),
                "Name" => $manager->getName(),
                "Photo" => $manager->getPhoto(),
                "Rol" => $manager->getRol()
            ];
        }
        return $arrayManagers;
    }
}