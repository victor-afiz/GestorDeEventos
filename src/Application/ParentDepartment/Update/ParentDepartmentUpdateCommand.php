<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:23
 */

namespace App\Application\ParentDepartment\Update;

use Assert\Assertion;

class ParentDepartmentUpdateCommand
{
    const INT_ARGUMENT_EXCEPTION = 'The id field must be numbers without string';
    const INT_EMPTY_ARGUMENT_EXCEPTION = 'The id field should not be empty';

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $id;

    /**
     * ParentDepartmentCreateCommand constructor.
     * @param $name
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id, $name)
    {
        Assertion::notNull($id, self::INT_EMPTY_ARGUMENT_EXCEPTION);
        Assertion::numeric($id, self::INT_ARGUMENT_EXCEPTION);

        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function name()
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