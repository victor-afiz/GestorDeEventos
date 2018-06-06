<?php

namespace App\Domain\Model\DeleteThing;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\DeleteThingDoctrineRepository\DeleteThingDoctrineRepository")
 */
class DeleteThing
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $deleteID;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $deleteThingID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameOfThing;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $managerID;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $userID;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * DeleteThing constructor.
     * @param string $deleteID
     * @param string $deleteThingID
     * @param string $nameOfThing
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($deleteID, $deleteThingID, $nameOfThing)
    {
        Assertion::uuid($deleteThingID);

        $this->deleteID = $deleteID;
        $this->deleteThingID = $deleteThingID;
        $this->nameOfThing = $nameOfThing;
        $this->date = \DateTime::createFromFormat('d-m-Y', date('d-m-Y'));
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDeleteID()
    {
        return $this->deleteID;
    }

    public function getDeleteThingID(): ?int
    {
        return $this->deleteThingID;
    }

    public function getNameOfThing(): ?string
    {
        return $this->nameOfThing;
    }

    public function getManagerID(): ?int
    {
        return $this->managerID;
    }

    /**
     * @param null|string $managerID
     * @return DeleteThing
     * @throws \Assert\AssertionFailedException
     */
    public function setManagerID(?string $managerID): self
    {
        Assertion::uuid($managerID);

        $this->managerID = $managerID;

        return $this;
    }

    public function getUserID(): ?string
    {
        return $this->userID;
    }

    /**
     * @param null|string $userID
     * @return DeleteThing
     * @throws \Assert\AssertionFailedException
     */
    public function setUserID(?string $userID): self
    {
        Assertion::uuid($userID);

        $this->userID = $userID;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
