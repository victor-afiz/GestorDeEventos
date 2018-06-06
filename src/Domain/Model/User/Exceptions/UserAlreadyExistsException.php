<?php


namespace App\Domain\Model\User\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class UserAlreadyExistsException extends DomainError
{
    const START_MESSAGE = 'User with ID: ';
    const END_MESSAGE = '  already exist';
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_NOT_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->id . self::END_MESSAGE ;
    }
}