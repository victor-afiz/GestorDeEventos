<?php


namespace App\Domain\Model\Contract\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class ContractUserDonsentExistsException extends DomainError
{
    const MESSAGE = 'Contract user ID dosent exist';

    public function __construct()
    {
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_CONFLICT;
    }

    function statusMessage()
    {
        return self::MESSAGE ;
    }
}