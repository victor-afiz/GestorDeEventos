<?php


namespace App\Domain\Model\ParentDepartment\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class ParentDepartmentAlreadyExistsException extends DomainError
{
    const START_MESSAGE = 'Parent Department whit name: ';
    const END_MESSAGE = ' already exist';
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->name . self::END_MESSAGE ;
    }
}