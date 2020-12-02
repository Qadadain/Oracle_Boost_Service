<?php

namespace App\Entity;

use App\Repository\ArmorTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmorTypeRepository::class)
 */
class ArmorType
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
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=RaidOffer::class, mappedBy="armorType")
     */
    private $raidOffers;

    public function __construct()
    {
        $this->raidOffers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|RaidOffer[]
     */
    public function getRaidOffers(): Collection
    {
        return $this->raidOffers;
    }

    public function addRaidOffer(RaidOffer $raidOffer): self
    {
        if (!$this->raidOffers->contains($raidOffer)) {
            $this->raidOffers[] = $raidOffer;
            $raidOffer->setArmorType($this);
        }

        return $this;
    }

    public function removeRaidOffer(RaidOffer $raidOffer): self
    {
        if ($this->raidOffers->removeElement($raidOffer)) {
            // set the owning side to null (unless already changed)
            if ($raidOffer->getArmorType() === $this) {
                $raidOffer->setArmorType(null);
            }
        }

        return $this;
    }
}