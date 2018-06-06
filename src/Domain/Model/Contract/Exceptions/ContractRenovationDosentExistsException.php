<?php


namespace App\Domain\Model\Contract\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class ContractRenovationDosentExistsException extends DomainError
{
    const START_MESSAGE = 'Contract whit renovation: ';
    const END_MESSAGE = ' dosent exist';
    private $renovation;

    public function __construct($renovation)
    {
        $this->renovation = $renovation;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->renovation . self::END_MESSAGE ;
    }
}