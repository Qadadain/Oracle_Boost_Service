<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ClasseFixtures extends Fixture
{
    public const CLASSES = [
        [
            'name' => 'Guerrier'
        ],
        [
            'name' => 'Paladin'
        ],
        [
            'name' => 'Chasseur'
        ],
        [
            'name' => 'Voleur'
        ],
        [
            'name' => 'Prêtre'
        ],
        [
            'name' => 'Chaman'
        ],
        [
            'name' => 'Mage'
        ],
        [
            'name' => 'Démoniste'
        ],
        [
            'name' => 'Moine'
        ],
        [
            'name' => 'Druide'
        ],
        [
            'name' => 'Chasseur de démons'
        ],
        [
            'name' => 'Chevalier de la mort'
        ],

    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::CLASSES as $data) {
            $classe = new Classe();
            $classe
                ->setName($data['name']);
            $manager->persist($classe);
        }

        $manager->flush();
    }

}
