<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 11:49
 */

namespace App\Domain\Shared\Exceptions;

abstract class DomainError extends \DomainException
{
    public function __construct()
    {
        parent::__construct($this->statusMessage(), $this->statusCode());
    }

    public abstract function statusCode();
    public abstract function statusMessage();
}