<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 10:22
 */

namespace App\Domain\Model\Clothe\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class ClotheIdCantBeNullException extends DomainError
{
    const MESSAGE = 'Clothe id cant be null ';


    public function __construct()
    {
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_NOT_FOUND;
    }

    function statusMessage()
    {
        return self::MESSAGE  ;
    }
}