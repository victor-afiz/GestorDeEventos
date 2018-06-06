<?php

namespace App\Domain\Model\ClotheCategory;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ClotheCategoryDoctrineRepository\ClotheCategoryDoctrineRepository")
 */
class ClotheCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=10, nullable=false)
     */
    private $sizeTypeName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deleteID;

    /**
     * ClotheCategory constructor.
     * @param $name
     * @param $sizeTypeName
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($name, $sizeTypeName)
    {
        $this->name = $name;
        $this->sizeTypeName = $sizeTypeName;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSizeTypeName(): ?string
    {
        return $this->sizeTypeName;
    }


    public function setSizeTypeName($sizeTypeName): self
    {
        $this->sizeTypeName = $sizeTypeName;

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
     * @return ClotheCategory
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
