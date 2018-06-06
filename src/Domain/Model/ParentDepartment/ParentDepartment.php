<?php

namespace App\Domain\Model\ParentDepartment;

use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentNameException;
use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ParentDepartmentDoctrineRepository\ParentDepartmentDoctrineRepository")
 */
class ParentDepartment
{
    const MIN_LENGTH_NAME = 5;
    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_ARGUMENT_EXCEPTION = 'The name field should not be empty';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * ParentDepartment constructor.
     * @param string $id
     * @param string $name
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ParentDepartment
     * @throws \Assert\AssertionFailedException
     */
    public function setName(string $name): self
    {
        Assertion::notNull($name, self::EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z]*$/",self::STRING_ARGUMENT_EXCEPTION);

        if (self::MIN_LENGTH_NAME > strlen($name)){
            throw new ParentDepartmentNameException(self::MIN_LENGTH_NAME);
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
     * @param string $deleteID
     * @return ParentDepartment
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
