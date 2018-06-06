<?php


namespace App\Domain\Model\Contract\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class DateIsOldException extends DomainError
{
    const START_MESSAGE = 'The date : ';
    const END_MESSAGE = ' is old than current date';
    private $endDate;

    public function __construct($endDate)
    {
        $this->endDate = $endDate;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->endDate . self::END_MESSAGE ;
    }
}