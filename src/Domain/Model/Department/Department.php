<?php

namespace App\Domain\Model\Department;

use App\Domain\Model\Department\Exceptions\DepartmentNameException;
use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\DepartmentDoctrineRepository\DepartmentDoctrineRepository")
 */
class Department
{

    const MIN_LENGTH_DEPARTMENT = 5;
    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_ARGUMENT_EXCEPTION = 'The name field should not be empty';
    const PARENT_DEPARTMENT_EXCEPTION = 'The parent departmentId must be numeric';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $parentDepartmentID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * Department constructor.
     * @param string $id
     * @param string $parentDepartmentID
     * @param string $name
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($parentDepartmentID, $name)
    {
        $this->setParentDepartmentID($parentDepartmentID);
        $this->setName($name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getParentDepartmentID(): ?int
    {
        return $this->parentDepartmentID;
    }


    public function setParentDepartmentID($parentDepartmentID): self
    {
        $this->parentDepartmentID = $parentDepartmentID;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Department
     * @throws \Assert\AssertionFailedException
     */
    public function setName(string $name): self
    {
        Assertion::notNull($name, self::EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z ]*$/",self::STRING_ARGUMENT_EXCEPTION);

        if (self::MIN_LENGTH_DEPARTMENT > strlen($name)){
            throw new DepartmentNameException(self::MIN_LENGTH_DEPARTMENT);
        }

        $this->name = $name;

        return $this;
    }

    public function isNotDeleted(): bool
    {
        $deleted = false;

        if (null == $this->deleteID || '' == $this->deleteID)
            $deleted = true;

        return $deleted;
    }

    public function isDeleted(): bool
    {
        $deleted = true;

        if (null == $this->deleteID || '' == $this->deleteID)
            $deleted = false;

        return $deleted;
    }

    /**
     * @param null|string $deleteID
     * @return Department
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
