<?php

namespace App\Domain\Model\User;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\UserDoctrineRepository\UserDoctrineRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=50)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nickName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameSurname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $employeeCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $departmentID;

    /**
     * @ORM\Column(type="string", length=10, nullable=false)
     */
    private $gender;

    /**
     * @ORM\Column(type="integer")
     */
    private $profilerDetailsID;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $contractID;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * User constructor.
     * @param $id
     * @param $nickName
     * @param $nameSurname
     * @param $email
     * @param $password
     * @param $employeeCode
     * @param $departmentID
     * @param $gender
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id, $nickName, $nameSurname, $email, $password, $employeeCode, $departmentID, $gender)
    {
        Assertion::uuid($id);

        $this->id = $id;
        $this->nickName = $nickName;
        $this->nameSurname = $nameSurname;
        $this->email = $email;
        $this->password = $password;
        $this->employeeCode = $employeeCode;
        $this->departmentID = $departmentID;
        $this->gender = $gender;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNickName(): ?string
    {
        return $this->nickName;
    }

    public function setNickName(string $nickName): self
    {
        $this->nickName = $nickName;

        return $this;
    }

    public function getNameSurname(): ?string
    {
        return $this->nameSurname;
    }

    public function setNameSurname(string $nameSurname): self
    {
        $this->nameSurname = $nameSurname;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmployeeCode(): ?int
    {
        return $this->employeeCode;
    }

    public function setEmployeeCode(int $employeeCode): self
    {
        $this->employeeCode = $employeeCode;

        return $this;
    }

    public function getDepartmentID(): ?int
    {
        return $this->departmentID;
    }

    public function setDepartmentID(int $departmentID): self
    {
        $this->departmentID = $departmentID;

        return $this;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getProfilerDetailsID(): ?int
    {
        return $this->profilerDetailsID;
    }

    public function setProfilerDetailsID(int $profilerSizesID): self
    {
        $this->profilerDetailsID = $profilerSizesID;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }


    public function getContractID(): ?int
    {
        return $this->contractID;
    }

    public function setContractID(int $contractID): self
    {
       $this->contractID = $contractID;

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
     * @return User
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
