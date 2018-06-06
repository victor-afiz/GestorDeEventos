<?php

namespace App\Domain\Model\LogManager;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\LogManagerDoctrineRepository\LogManagerDoctrineRepository")
 */
class LogManager
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $managerID;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->date->add(\DateInterval::createFromDateString('+20 minutes'));
    }

    public function token(): ?string
    {
        return $this->token;
    }


    public function getManagerID(): ?int
    {
        return $this->managerID;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
