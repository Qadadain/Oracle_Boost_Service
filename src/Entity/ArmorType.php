<?php

namespace App\Entity;

use App\Repository\ArmorTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank(message="Veuillez saisir un Type d'armure.")
     * @Assert\Length(max="255", maxMessage="Le type d'armure saisie {{ value }} est trop long, il ne devrait pas dépasser {{ limit }} caractères")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=RaidBoost::class, mappedBy="armorType")
     */
    private $raidBoosts;

    /**
     * @ORM\OneToMany(targetEntity=DungeonBoost::class, mappedBy="armorType")
     */
    private $dungeonBoosts;

    public function __construct()
    {
        $this->raidBoosts = new ArrayCollection();
        $this->dungeonBoosts = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->type;
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
            $raidBoost->setArmorType($this);
        }

        return $this;
    }

    public function removeRaidBoost(RaidBoost $raidBoost): self
    {
        if ($this->raidBoosts->removeElement($raidBoost)) {
            // set the owning side to null (unless already changed)
            if ($raidBoost->getArmorType() === $this) {
                $raidBoost->setArmorType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DungeonBoost[]
     */
    public function getDungeonBoosts(): Collection
    {
        return $this->dungeonBoosts;
    }

    public function addDungeonBoost(DungeonBoost $dungeonBoost): self
    {
        if (!$this->dungeonBoosts->contains($dungeonBoost)) {
            $this->dungeonBoosts[] = $dungeonBoost;
            $dungeonBoost->setArmorType($this);
        }

        return $this;
    }

    public function removeDungeonBoost(DungeonBoost $dungeonBoost): self
    {
        if ($this->dungeonBoosts->removeElement($dungeonBoost)) {
            // set the owning side to null (unless already changed)
            if ($dungeonBoost->getArmorType() === $this) {
                $dungeonBoost->setArmorType(null);
            }
        }

        return $this;
    }
}
