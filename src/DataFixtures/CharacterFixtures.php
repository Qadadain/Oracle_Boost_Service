<?php

namespace App\DataFixtures;

use App\Entity\Character;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CharacterFixtures extends Fixture implements DependentFixtureInterface
{
    public const CHARACTERS = [
        [
            'pseudo' => 'Cæssis',
            'comment' => 'Trop Nul',
            'iLvl' => 180,
        ],
        [
            'pseudo' => 'Hellmefast',
            'comment' => 'Trop Nul',
            'iLvl' => 180,
        ],
        [
            'pseudo' => 'Ortadrood',
            'comment' => 'Trop Nul',
            'iLvl' => 180,
        ],
        [
            'pseudo' => 'FranHunt',
            'comment' => 'Trop Nul',
            'iLvl' => 180,
        ],
        [
            'pseudo' => 'Gloutank',
            'comment' => 'Trop Nul',
            'iLvl' => 180,
        ],
        [
            'pseudo' => 'FouckyHunt',
            'comment' => 'Trop Nul',
            'iLvl' => 180,
        ],
        [
            'pseudo' => 'Orta',
            'comment' => 'Trop Nul',
            'iLvl' => 180,
        ],
    ];

    public function getDependencies(): array
    {
        return [UserFixtures::class, ClasseFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::CHARACTERS as $data) {
            $character = new Character();
            $userId = random_int(1, 7);
            $character->setPseudo($data['pseudo'])
                ->setILvl($data['iLvl'])
                ->setComment($data['comment']);
             $character->setUser($manager->find('App:User', $userId));
             $character->setClasse($manager->find('App:Classe', random_int(1, 7)));
            $manager->persist($character);
        }

        $manager->flush();
    }
}
