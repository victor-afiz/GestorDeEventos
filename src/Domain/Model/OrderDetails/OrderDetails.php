<?php

namespace App\Domain\Model\OrderDetails;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\OrderDoctrineRepository\OrderDoctrineRepository")
 */
class OrderDetails
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $clotheSizeStockID;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $orderID;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * OrderDetails constructor.
     * @param string $clotheSizeStockID
     * @param string $orderID
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(int $clotheSizeStockID, int $orderID)
    {
        $this->clotheSizeStockID = $clotheSizeStockID;
        $this->orderID = $orderID;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getClotheSizeStockID(): ?int
    {
        return $this->clotheSizeStockID;
    }

    public function getOrderID(): ?string
    {
        return $this->orderID;
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
     * @return OrderDetails
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
