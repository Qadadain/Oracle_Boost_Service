<?php

namespace App\Entity;

use App\Repository\DungeonBoostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=255)
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
     * @ORM\ManyToMany(targetEntity=Character::class, inversedBy="dungeonBoosts")
     */
    private $tank;

    /**
     * @ORM\ManyToMany(targetEntity=Character::class, inversedBy="dungeonBoosts")
     */
    private $heal;

    /**
     * @ORM\ManyToMany(targetEntity=Character::class, inversedBy="dungeonBoosts")
     */
    private $dpsOne;

    /**
     * @ORM\ManyToMany(targetEntity=Character::class, inversedBy="dungeonBoosts")
     */
    private $dpsTwo;

    public function __construct()
    {
        $this->tank = new ArrayCollection();
        $this->heal = new ArrayCollection();
        $this->dpsOne = new ArrayCollection();
        $this->dpsTwo = new ArrayCollection();
    }

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

    /**
     * @return Collection|Character[]
     */
    public function getTank(): Collection
    {
        return $this->tank;
    }

    public function addTank(Character $tank): self
    {
        if (!$this->tank->contains($tank)) {
            $this->tank[] = $tank;
        }

        return $this;
    }

    public function removeTank(Character $tank): self
    {
        $this->tank->removeElement($tank);

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getHeal(): Collection
    {
        return $this->heal;
    }

    public function addHeal(Character $heal): self
    {
        if (!$this->heal->contains($heal)) {
            $this->heal[] = $heal;
        }

        return $this;
    }

    public function removeHeal(Character $heal): self
    {
        $this->heal->removeElement($heal);

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getDpsOne(): Collection
    {
        return $this->dpsOne;
    }

    public function addDpsOne(Character $dpsOne): self
    {
        if (!$this->dpsOne->contains($dpsOne)) {
            $this->dpsOne[] = $dpsOne;
        }

        return $this;
    }

    public function removeDpsOne(Character $dpsOne): self
    {
        $this->dpsOne->removeElement($dpsOne);

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getDpsTwo(): Collection
    {
        return $this->dpsTwo;
    }

    public function addDpsTwo(Character $dpsTwo): self
    {
        if (!$this->dpsTwo->contains($dpsTwo)) {
            $this->dpsTwo[] = $dpsTwo;
        }

        return $this;
    }

    public function removeDpsTwo(Character $dpsTwo): self
    {
        $this->dpsTwo->removeElement($dpsTwo);

        return $this;
    }
}
