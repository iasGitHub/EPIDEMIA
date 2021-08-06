<?php

namespace App\Entity;

use App\Repository\PointSurveillanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PointSurveillanceRepository::class)
 */
class PointSurveillance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $coordonnees;

    /**
     * @ORM\ManyToOne(targetEntity=Zone::class, inversedBy="pointS")
     */
    private $zones;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCoordonnees(): ?string
    {
        return $this->coordonnees;
    }

    public function setCoordonnees(string $coordonnees): self
    {
        $this->coordonnees = $coordonnees;

        return $this;
    }

    public function getZones(): ?Zone
    {
        return $this->zones;
    }

    public function setZones(?Zone $zones): self
    {
        $this->zones = $zones;

        return $this;
    }

    public function __toString() 
    {
        return $this->code;
    }
}
