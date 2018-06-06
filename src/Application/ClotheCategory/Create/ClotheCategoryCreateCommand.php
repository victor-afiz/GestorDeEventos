<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 12:59
 */

namespace App\Application\ClotheCategory\Create;


use Assert\Assertion;

class ClotheCategoryCreateCommand
{
    private $name;
    private $typeSizeName;
    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_ARGUMENT_EXCEPTION = 'The name field should not be empty';

    /**
     * DepartmentCreateCommand constructor.
     * @param $name
     * @param null|string $description
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $name,$typeSizeName)
    {
        Assertion::notNull($name, self::EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z ]*$/",self::STRING_ARGUMENT_EXCEPTION);
        $this->name = $name;
        $this->typeSizeName = $typeSizeName;
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
    public function typeSizeName()
    {
        return $this->typeSizeName;
    }


}