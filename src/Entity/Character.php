<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
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
    private $pseudo;

    /**
     * @ORM\Column(type="integer")
     */
    private $iLvl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="characters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classe;

    /**
     * @ORM\OneToMany(targetEntity=DungeonBoost::class, mappedBy="tank")
     */
    private $dungeonBoosts;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="characters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->dungeonBoosts = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->pseudo;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getILvl(): ?int
    {
        return $this->iLvl;
    }

    public function setILvl(int $iLvl): self
    {
        $this->iLvl = $iLvl;

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

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

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
            $dungeonBoost->setTank($this);
        }

        return $this;
    }

    public function removeDungeonBoost(DungeonBoost $dungeonBoost): self
    {
        if ($this->dungeonBoosts->removeElement($dungeonBoost)) {
            // set the owning side to null (unless already changed)
            if ($dungeonBoost->getTank() === $this) {
                $dungeonBoost->setTank(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
