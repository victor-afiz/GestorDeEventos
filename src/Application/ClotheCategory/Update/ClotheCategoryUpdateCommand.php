<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 8:59
 */

namespace App\Application\ClotheCategory\Update;

use Assert\Assertion;

class ClotheCategoryUpdateCommand
{
    private $name;
    private $id;
    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_ARGUMENT_EXCEPTION = 'The name field should not be empty';

    /**
     * ClotheCategoryUpdateCommand constructor.
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id, $name)
    {
        Assertion::notNull($name, self::EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z ]*$/",self::STRING_ARGUMENT_EXCEPTION);

        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

}