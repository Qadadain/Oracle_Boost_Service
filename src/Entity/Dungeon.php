<?php

namespace App\Entity;

use App\Repository\DungeonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DungeonRepository::class)
 */
class Dungeon
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=DungeonBoost::class, mappedBy="dungeon")
     */
    private $dungeonBoosts;

    public function __construct()
    {
        $this->dungeonBoosts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $dungeonBoost->setDungeon($this);
        }

        return $this;
    }

    public function removeDungeonBoost(DungeonBoost $dungeonBoost): self
    {
        if ($this->dungeonBoosts->removeElement($dungeonBoost)) {
            // set the owning side to null (unless already changed)
            if ($dungeonBoost->getDungeon() === $this) {
                $dungeonBoost->setDungeon(null);
            }
        }

        return $this;
    }
}
