<?php

namespace App\Entity;

use App\Repository\RaidOfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaidOfferRepository::class)
 */
class RaidOffer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offerType;

    /**
     * @ORM\OneToMany(targetEntity=RaidBoost::class, mappedBy="raidOffer")
     */
    private $raidBoosts;

    public function __construct()
    {
        $this->raidBoosts = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->offerType;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOfferType(): ?string
    {
        return $this->offerType;
    }

    public function setOfferType(string $offerType): self
    {
        $this->offerType = $offerType;

        return $this;
    }

    /**
     * @return Collection|RaidBoost[]
     */
    public function getRaidBoosts(): Collection
    {
        return $this->raidBoosts;
    }

    public function addRaidBoost(RaidBoost $raidBoost): self
    {
        if (!$this->raidBoosts->contains($raidBoost)) {
            $this->raidBoosts[] = $raidBoost;
            $raidBoost->setRaidOffer($this);
        }

        return $this;
    }

    public function removeRaidBoost(RaidBoost $raidBoost): self
    {
        if ($this->raidBoosts->removeElement($raidBoost)) {
            // set the owning side to null (unless already changed)
            if ($raidBoost->getRaidOffer() === $this) {
                $raidBoost->setRaidOffer(null);
            }
        }

        return $this;
    }
}
