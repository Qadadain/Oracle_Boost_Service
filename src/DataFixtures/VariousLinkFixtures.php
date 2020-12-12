<?php

namespace App\DataFixtures;

use App\Entity\VariousLink;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VariousLinkFixtures extends Fixture
{
    public const LINKS = [
        [
            'name' => 'Communauté Oracle',
            'link' => 'https://worldofwarcraft.com/fr-fr/invite/mo5ALWhyzA?region=EU&faction=Horde'
        ],
        [
            'name' => 'Info SL',
            'link' => 'https://docs.google.com/spreadsheets/d/1knN7lunBpT3lAmEerXklaPswiPUICZtqJDnzEMifEd8/edit#gid=1252874507'
        ],
        [
            'name' => 'Mini Jeu Boss',
            'link' => 'http://tacticalairhorse.com/castle-pineapplia/en/'
        ],
        [
            'name' => 'Choix Convenant',
            'link' => 'https://docs.google.com/spreadsheets/d/1E1TxEKvH6LoCUwhG1-8QQ4CikblmHaaBp-Ozr9ugQHw/htmlview?usp=sharing&pru=AAABdgwiJm4*AgsiZmsfyF_9TMLRIVCmRg'
        ],
        [
            'name' => 'Compo Raid',
            'link' => 'https://docs.google.com/spreadsheets/d/19wzd7WfJSggg8uwGxTtqAr8xbZPvncBTEUy9jIIof3o/edit?usp=sharing'
        ],
        [
            'name' => 'WA Raid',
            'link' => 'https://wago.io/slraid1progress'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::LINKS as $data){
            $variousLink = new VariousLink();
            $variousLink->setName($data['name'])
                ->setLink($data['link']);
            $manager->persist($variousLink);
        }

        $manager->flush();
    }
}
