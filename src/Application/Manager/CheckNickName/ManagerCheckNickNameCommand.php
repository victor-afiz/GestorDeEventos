<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:42
 */

namespace App\Application\Manager\CheckNickName;


use Assert\Assertion;

class ManagerCheckNickNameCommand
{
    private $nickName;

    /**
     * ManagerCheckNickNameCommand constructor.
     * @param $nickName
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($nickName)
    {
        Assertion::notNull($nickName, "The nickName doesnt can be blank");
        $this->nickName = $nickName;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }


}