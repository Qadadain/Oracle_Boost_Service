<?php

namespace App\Entity;

use App\Repository\RaidOfferRepository;
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
}
