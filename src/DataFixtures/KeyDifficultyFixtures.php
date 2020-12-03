<?php

namespace App\DataFixtures;

use App\Entity\KeyDifficulty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class KeyDifficultyFixtures extends Fixture
{
    public const DIFFICULTIES = [
        [
            'difficulty' => '+5'
        ],
        [
            'difficulty' => '+6'
        ],
        [
            'difficulty' => '+7'
        ],
        [
            'difficulty' => '+8'
        ],
        [
            'difficulty' => '+9'
        ],
        [
            'difficulty' => '+10'
        ],
        [
            'difficulty' => '+11'
        ],
        [
            'difficulty' => '+12'
        ],
        [
            'difficulty' => '+13'
        ],
        [
            'difficulty' => '+14'
        ],
        [
            'difficulty' => '+15'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DIFFICULTIES as $data) {
            $keyDifficulty = new KeyDifficulty();
            $keyDifficulty
                ->setDifficulty($data['difficulty']);
            $manager->persist($keyDifficulty);
        }

        $manager->flush();
    }
}
