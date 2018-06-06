<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:51
 */

namespace App\Domain\Model\DeleteThing;


interface DeleteThingRepository
{
    /**
     * @param DeleteThing $deleteThing
     */
    public function insert(DeleteThing $deleteThing): void ;
}