<?php

namespace App\Entity;

use App\Repository\DungeonBoostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DungeonBoostRepository::class)
 */
class DungeonBoost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $customer;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=ArmorType::class, inversedBy="dungeonBoosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $armorType;

    /**
     * @ORM\ManyToOne(targetEntity=Dungeon::class, inversedBy="dungeonBoosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dungeon;

    /**
     * @ORM\ManyToOne(targetEntity=KeyDifficulty::class, inversedBy="dungeonBoosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $keyDifficulty;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="dungeonBoosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tank;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $heal;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $dpsOne;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $dpsTwo;

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

    public function getArmorType(): ?ArmorType
    {
        return $this->armorType;
    }

    public function setArmorType(?ArmorType $armorType): self
    {
        $this->armorType = $armorType;

        return $this;
    }

    public function getDungeon(): ?Dungeon
    {
        return $this->dungeon;
    }

    public function setDungeon(?Dungeon $dungeon): self
    {
        $this->dungeon = $dungeon;

        return $this;
    }

    public function getKeyDifficulty(): ?KeyDifficulty
    {
        return $this->keyDifficulty;
    }

    public function setKeyDifficulty(?KeyDifficulty $keyDifficulty): self
    {
        $this->keyDifficulty = $keyDifficulty;

        return $this;
    }

    public function getTank(): ?Character
    {
        return $this->tank;
    }

    public function setTank(?Character $tank): self
    {
        $this->tank = $tank;

        return $this;
    }

    public function getHeal(): ?Character
    {
        return $this->heal;
    }

    public function setHeal(?Character $heal): self
    {
        $this->heal = $heal;

        return $this;
    }

    public function getDpsOne(): ?Character
    {
        return $this->dpsOne;
    }

    public function setDpsOne(?Character $dpsOne): self
    {
        $this->dpsOne = $dpsOne;

        return $this;
    }

    public function getDpsTwo(): ?Character
    {
        return $this->dpsTwo;
    }

    public function setDpsTwo(?Character $dpsTwo): self
    {
        $this->dpsTwo = $dpsTwo;

        return $this;
    }
}
