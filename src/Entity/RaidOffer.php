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
     * @ORM\Column(type="string", length=100)
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity=ArmorType::class, inversedBy="raidOffers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $armorType;

    /**
     * @ORM\ManyToOne(targetEntity=RaidOffer::class, inversedBy="raidOffers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $raidOffer;

    /**
     * @ORM\OneToMany(targetEntity=RaidOffer::class, mappedBy="raidOffer")
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

    public function getOfferType(): ?string
    {
        return $this->offerType;
    }

    public function setOfferType(string $offerType): self
    {
        $this->offerType = $offerType;

        return $this;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getArmorType(): ?ArmorType
    {
        return $this->armorType;
    }

    public function setArmorType(?ArmorType $armorType): self
    {
        $this->armorType = $armorType;

        return $this;
    }

    public function getRaidOffer(): ?self
    {
        return $this->raidOffer;
    }

    public function setRaidOffer(?self $raidOffer): self
    {
        $this->raidOffer = $raidOffer;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getRaidOffers(): Collection
    {
        return $this->raidOffers;
    }

    public function addRaidOffer(self $raidOffer): self
    {
        if (!$this->raidOffers->contains($raidOffer)) {
            $this->raidOffers[] = $raidOffer;
            $raidOffer->setRaidOffer($this);
        }

        return $this;
    }

    public function removeRaidOffer(self $raidOffer): self
    {
        if ($this->raidOffers->removeElement($raidOffer)) {
            // set the owning side to null (unless already changed)
            if ($raidOffer->getRaidOffer() === $this) {
                $raidOffer->setRaidOffer(null);
            }
        }

        return $this;
    }
}
