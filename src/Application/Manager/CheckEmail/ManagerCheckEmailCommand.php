<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 8:16
 */

namespace App\Application\Manager\CheckEmail;


use Assert\Assertion;

class ManagerCheckEmailCommand
{
    private $email;

    /**
     * ManagerCheckEmailCommand constructor.
     * @param $email
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($email)
    {
        Assertion::notNull($email, "The Email doesnt can be blank");
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function email()
    {
        return $this->email;
    }

}