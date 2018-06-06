<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 11:46
 */

namespace App\Domain\Model\Department\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class DepartmentNameException extends DomainError
{
    const START_MESSAGE = 'Department name must have more than ';
    const END_MESSAGE = ' letters';
    private $minLength;

    public function __construct(int $minLength)
    {
        $this->minLength = $minLength;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_LENGTH_REQUIRED;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->minLength . self::END_MESSAGE ;
    }
}