<?php

namespace App\Entity;

use App\Repository\KeyDifficultyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KeyDifficultyRepository::class)
 */
class KeyDifficulty
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $difficulty;

    /**
     * @ORM\OneToMany(targetEntity=DungeonBoost::class, mappedBy="keyDifficulty")
     */
    private $dungeonBoosts;

    public function __construct()
    {
        $this->dungeonBoosts = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->difficulty;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;

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
            $dungeonBoost->setKeyDifficulty($this);
        }

        return $this;
    }

    public function removeDungeonBoost(DungeonBoost $dungeonBoost): self
    {
        if ($this->dungeonBoosts->removeElement($dungeonBoost)) {
            // set the owning side to null (unless already changed)
            if ($dungeonBoost->getKeyDifficulty() === $this) {
                $dungeonBoost->setKeyDifficulty(null);
            }
        }

        return $this;
    }
}
