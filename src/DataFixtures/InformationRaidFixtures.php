<?php

namespace App\DataFixtures;

use App\Entity\InformationRaid;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InformationRaidFixtures extends Fixture
{
    public const LINKS = [
        [
            'name' => 'Rosters',
            'link' => 'https://docs.google.com/spreadsheets/d/1-594-TAioCEAJ7cqxBrIQumjPz9PkQHJwlztvh2Sdt4/edit#gid=564928154'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::LINKS as $data){
            $informationRaid = new InformationRaid();
            $informationRaid->setName($data['name'])
                ->setLink($data['link']);
            $manager->persist($informationRaid);
        }

        $manager->flush();
    }
}
