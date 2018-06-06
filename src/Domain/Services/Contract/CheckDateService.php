<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 14:22
 */

namespace App\Domain\Services\Contract;


class CheckDateService
{

    static function execute($date)
    {
        return $date < \DateTime::createFromFormat('d-m-Y', date('d-m-Y'));
    }
}