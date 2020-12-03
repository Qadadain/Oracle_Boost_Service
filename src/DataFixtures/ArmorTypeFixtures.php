<?php

namespace App\DataFixtures;

use App\Entity\ArmorType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArmorTypeFixtures extends Fixture
{
    public const ARMORTYPE = [
        [
            'type' => 'Tissu'
        ],
        [
            'type' => 'Cuir'
        ],
        [
            'type' => 'Maille'
        ],
        [
            'type' => 'Plaque'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ARMORTYPE as $data) {
            $armorType = new ArmorType();
            $armorType
                ->setType($data['type']);
            $manager->persist($armorType);
        }

        $manager->flush();
    }
}
