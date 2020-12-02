<?php

namespace App\Entity;

use App\Repository\RaidBoostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaidBoostRepository::class)
 */
class RaidBoost
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
    private $customer;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comment;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=ArmorType::class, inversedBy="raidBoosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $armorType;

    /**
     * @ORM\ManyToOne(targetEntity=RaidOffer::class, inversedBy="raidBoosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $raidOffer;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
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

    public function getArmorType(): ?ArmorType
    {
        return $this->armorType;
    }

    public function setArmorType(?ArmorType $armorType): self
    {
        $this->armorType = $armorType;

        return $this;
    }

    public function getRaidOffer(): ?RaidOffer
    {
        return $this->raidOffer;
    }

    public function setRaidOffer(?RaidOffer $raidOffer): self
    {
        $this->raidOffer = $raidOffer;

        return $this;
    }
}
