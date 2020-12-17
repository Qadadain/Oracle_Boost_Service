<?php

namespace App\DataFixtures;

use App\Entity\InformationGuild;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InformationGuildFixtures extends Fixture
{
    public const LINKS = [
        [
            'name' => 'Charte',
            'link' => 'https://docs.google.com/document/d/1BXfSDr8u02pes0qGijLC2caYHrMZoSkekv3h__TGTM4/edit'
        ],
        [
            'name' => 'Organisation interne',
            'link' => 'https://docs.google.com/spreadsheets/d/1HBHgu4XHGJNlDcjYWlHrV_UROmfDpC9AzBDegmGAo0I/edit#gid=2064401605'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::LINKS as $data){
            $informationGuild = new InformationGuild();
            $informationGuild->setName($data['name'])
                ->setLink($data['link']);
            $manager->persist($informationGuild);
        }

        $manager->flush();
    }
}
