<?php

namespace App\Domain\Model\Delivery;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\DeliveryDoctrineRepository\DeliveryDoctrineRepository")
 */
class Delivery
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
    private $orderID;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $managerID;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sign;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $docSign;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * Delivery constructor.
     * @param $orderID
     * @param $managerID
     */
    public function __construct($orderID, $managerID, $docSign)
    {
        $this->orderID = $orderID;
        $this->managerID = $managerID;
        $this->docSign = $docSign;
        $this->date = date("Y-m-d H:i:s") ;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getOrderID(): string
    {
        return $this->orderID;
    }

    public function getManagerID(): string
    {
        return $this->managerID;
    }

    /**
     * @param $managerID
     * @return Delivery
     */
    public function setManagerID($managerID): self
    {
        $this->managerID = $managerID;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function getSign(): ?string
    {
        return $this->sign;
    }

    public function setSign(?string $sign): self
    {
        $this->sign = $sign;

        return $this;
    }

    public function getDocSign(): ?string
    {
        return $this->docSign;
    }

    public function setDocSign(string $docSign): self
    {
        $this->docSign = $docSign;

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
     * @return Delivery
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
