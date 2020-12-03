<?php

namespace App\DataFixtures;

use App\Entity\InformationBoost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InformationBoostFixtures extends Fixture
{
    public const INFORMATIONS = [
        [
            'amountDungeonBoost' => 150000,
            'stackArmorAmount' => 15000,
            'messageInformation' => 'Bonjour, Pour l\'instant les boosts raid ne sont pas disponible à la vente, mais les Donjons MM+, Mount Mécagone et Mount Jaina dispo. MP Glouz pour plus d\'info'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::INFORMATIONS as $data) {
            $informationBoost = new InformationBoost();
            $informationBoost
                ->setAmountDungeonBoost($data['amountDungeonBoost'])
                ->setStackArmorAmount($data['stackArmorAmount'])
                ->setMessageInformation($data['messageInformation']);
            $manager->persist($informationBoost);
        }

        $manager->flush();
    }
}
