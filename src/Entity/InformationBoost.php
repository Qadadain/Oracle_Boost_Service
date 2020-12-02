<?php

namespace App\Entity;

use App\Repository\InformationBoostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InformationBoostRepository::class)
 */
class InformationBoost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $amountDungeonBoost;

    /**
     * @ORM\Column(type="integer")
     */
    private $stackArmorAmount;

    /**
     * @ORM\Column(type="text")
     */
    private $messageInformation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmountDungeonBoost(): ?int
    {
        return $this->amountDungeonBoost;
    }

    public function setAmountDungeonBoost(int $amountDungeonBoost): self
    {
        $this->amountDungeonBoost = $amountDungeonBoost;

        return $this;
    }

    public function getStackArmorAmount(): ?int
    {
        return $this->stackArmorAmount;
    }

    public function setStackArmorAmount(int $stackArmorAmount): self
    {
        $this->stackArmorAmount = $stackArmorAmount;

        return $this;
    }

    public function getMessageInformation(): ?string
    {
        return $this->messageInformation;
    }

    public function setMessageInformation(string $messageInformation): self
    {
        $this->messageInformation = $messageInformation;

        return $this;
    }
}
