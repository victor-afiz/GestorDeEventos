<?php

namespace App\Domain\Model\Clothe;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ClotheDoctrineRepository\ClotheDoctrineRepository")
 */
class Clothe
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=50)
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $clotheCategoryID;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * Clothe constructor.
     * @param $id
     * @param $clotheCategoryID
     * @param $name
     * @param $genderID
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id, $clotheCategoryID, $name, $gender, $photo, $description)
    {
        Assertion::uuid($id);

        $this->id = $id;
        $this->clotheCategoryID = $clotheCategoryID;
        $this->name = $name;
        $this->gender = $gender;
        $this->photo = $photo;
        $this->description = $description;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getClotheCategoryId(): ?int
    {
        return $this->clotheCategoryID;
    }

    public function setClotheCategoryId(int $clotheCategoryID): self
    {
        $this->clotheCategoryID = $clotheCategoryID;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGenderId(string $gender): self
    {
        $this->gender = $gender;

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
     * @return Clothe
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteId(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
