<?php

namespace App\DataFixtures;

use App\Entity\InformationMember;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InformationMemberFixtures extends Fixture
{
    public const LINKS = [
        [
            'name' => 'Légendaires',
            'link' => 'https://docs.google.com/spreadsheets/d/1Q46wZysi7TaQyV37DX1QzUvfvXzQU-4lKNwQ2ncfASY/edit#gid=1748231247'
        ],
        [
            'name' => 'Métiers',
            'link' => 'https://docs.google.com/spreadsheets/d/13qfMMtNZiUJ4CnDEUnV1jB7f0z1lbO9JnTTnu6xzN4o/edit#gid=501524172'
        ],
        [
            'name' => 'Recensement',
            'link' => 'https://docs.google.com/spreadsheets/d/1qtsUOWMAyPNclS2ZUPFixonoBQ7_HdCAx0b0gTtsEyA/edit#gid=0'
        ],
        [
            'name' => 'Vote Logo Guilde',
            'link' => 'https://strawpoll.com/c4pr73hkr'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::LINKS as $data){
            $informationMember = new InformationMember();
            $informationMember->setName($data['name'])
                ->setLink($data['link']);
            $manager->persist($informationMember);
        }

        $manager->flush();
    }
}
