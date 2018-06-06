<?php

namespace App\Domain\Model\Contract;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ContractDoctrineRepository\ContractDoctrineRepository")
 */
class Contract
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
    private $userID;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $endDate;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $renovation;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    const EMPTY_ID_EXCEPTION = 'The id field should not be empty';
    const INTEGER_ARGUMENT_EXCEPTION = 'The id field must be integer';

    const EMPTY_END_DATE_EXCEPTION = 'The date field should not be empty';
    const DATE_ARGUMENT_EXCEPTION = 'The date field must be type date';

    const EMPTY_RENOVATION_EXCEPTION = 'The renovation field should not be empty';
    const RENOVATION_ARGUMENT_EXCEPTION = 'The renovation field must be type boolean';

    /**
     * Contract constructor.
     * @param $userID
     * @param $endDate
     * @param $renovation
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($userID , $endDate, $renovation, $startDate)
    {
        Assertion::notNull($userID, self::EMPTY_ID_EXCEPTION);
        Assertion::uuid($userID, self::INTEGER_ARGUMENT_EXCEPTION);

        $this->userID = $userID;
        $this->setEndDate($endDate);
        $this->setRenovation($renovation);
        $this->setStartDate ($startDate);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserID(): ?string
    {
        return $this->userID;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param $startDate
     * @return Contract
     * @throws \Assert\AssertionFailedException
     */
    public function setStartDate($startDate): self
    {
        Assertion::notNull($startDate, self::EMPTY_END_DATE_EXCEPTION);
        Assertion::date($startDate, 'd-m-Y',self::DATE_ARGUMENT_EXCEPTION);

        $this->startDate = \DateTime::createFromFormat('d-m-Y', $startDate);

        return $this;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param $endDate
     * @return Contract
     * @throws \Assert\AssertionFailedException
     */
    public function setEndDate($endDate): self
    {
        Assertion::notNull($endDate, self::EMPTY_END_DATE_EXCEPTION);
        Assertion::date($endDate, 'd-m-Y',self::DATE_ARGUMENT_EXCEPTION);

        $this->endDate = \DateTime::createFromFormat('d-m-Y', $endDate);

        return $this;
    }

    public function getRenovation()
    {
        return $this->renovation;
    }

    /**
     * @param $renovation
     * @return Contract
     */
    public function setRenovation($renovation): self
    {
        $renovation = boolval($renovation);
        $this->renovation = $renovation;

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
     * @return Contract
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
