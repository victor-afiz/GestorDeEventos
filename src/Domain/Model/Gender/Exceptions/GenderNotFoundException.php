<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 10:22
 */

namespace App\Domain\Model\Gender\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class GenderNotFoundException extends DomainError
{
    const START_MESSAGE = 'Gender: ';
    const END_MESSAGE = ' dosent found';
    private $gender;

    public function __construct(string $gender)
    {
        $this->gender = $gender;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_NOT_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->gender . self::END_MESSAGE ;
    }
}