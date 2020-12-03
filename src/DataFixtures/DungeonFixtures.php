<?php

namespace App\DataFixtures;

use App\Entity\Dungeon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DungeonFixtures extends Fixture
{
    public const DUNGEONS = [
        [
            'name' => 'Brumes de Tirna Scithe'
        ],
        [
            'name' => 'Flèches de l\'Ascension'
        ],
        [
            'name' => 'L\'Autre côté'
        ],
        [
            'name' => 'Malepeste'
        ],
        [
            'name' => 'Profondeurs Sanguines'
        ],
        [
            'name' => 'Salles de L\'Expiation'
        ],
        [
            'name' => 'Sillage nécrotique'
        ],
        [
            'name' => 'Théâtre de la Souffrance'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::DUNGEONS as $data) {
            $dungeon = new Dungeon();
            $dungeon
                ->setName($data['name']);
            $manager->persist($dungeon);
        }

        $manager->flush();
    }
}
