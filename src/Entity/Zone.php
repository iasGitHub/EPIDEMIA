<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 */
class Zone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $nom;

    

    /**
     * @ORM\OneToMany(targetEntity=PointSurveillance::class, mappedBy="zone")
     */
    private $pointS;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="zone")
     */
    private $pays;

    public function __construct()
    {
        $this->pointS = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * @return Collection|PointSurveillance[]
     */
    public function getPointS(): Collection
    {
        return $this->pointS;
    }

    public function addPoint(PointSurveillance $point): self
    {
        if (!$this->pointS->contains($point)) {
            $this->pointS[] = $point;
            $point->setZone($this);
        }

        return $this;
    }

    public function __toString() 
    {
        return $this->nom;
    }

    public function removePoint(PointSurveillance $point): self
    {
        if ($this->pointS->removeElement($point)) {
            // set the owning side to null (unless already changed)
            if ($point->getZone() === $this) {
                $point->setZone(null);
            }
        }

        return $this;
    }

    
}
