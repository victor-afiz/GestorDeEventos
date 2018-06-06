<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 13:33
 */

namespace App\Domain\Model\SizeType\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class SizeTypeDosentExistException extends DomainError
{
    const START_MESSAGE = 'Size Type with Name: ';
    const END_MESSAGE = '  doesnt exist';
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_NOT_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->name . self::END_MESSAGE;
    }
}