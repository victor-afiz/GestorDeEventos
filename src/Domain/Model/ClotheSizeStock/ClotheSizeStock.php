<?php

namespace App\Domain\Model\ClotheSizeStock;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ClotheSizeStockDoctrineRepository\ClotheSizeStockDoctrineRepository")
 */
class ClotheSizeStock
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $clotheID;

    /**
     * @ORM\Column(type="string", length=10, nullable=false)
     */
    private $sizeID;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * ClotheSizeStock constructor.
     * @param string $clotheID
     * @param int $sizeID
     * @param string $id
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $clotheID, $sizeID)
    {
        Assertion::uuid($clotheID);

        $this->clotheID = $clotheID;
        $this->sizeID = $sizeID;
        $this->stock = 0;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getClotheId(): ?string
    {
        return $this->clotheID;
    }

    public function getSizeId(): ?int
    {
        return $this->sizeID;
    }


    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $this->stock + $stock;

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
     * @return ClotheSizeStock
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteId(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
