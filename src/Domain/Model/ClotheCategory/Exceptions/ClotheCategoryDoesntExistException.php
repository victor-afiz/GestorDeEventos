<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 10:22
 */

namespace App\Domain\Model\ClotheCategory\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class ClotheCategoryDoesntExistException extends DomainError
{
    const START_MESSAGE = 'Clothe category with ID: ';
    const END_MESSAGE = '  doesnt exist';
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