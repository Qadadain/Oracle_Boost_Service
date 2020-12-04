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
            'name' => 'Guerrier',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/warrior-02deb9318a3a7a31a1dfa12696aa22f2b415527d997cdbd77d21009274b467ed.svg',
            'color' => '#883d10'
        ],
        [
            'name' => 'Paladin',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/paladin-04e740dbc5882a8d358d086a88c960d18ac79c2a0583ad5843c1735e10eff231.svg',
            'color' => '#ff8ed5'
        ],
        [
            'name' => 'Chasseur',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/hunter-2b1a0190f30ddb1918878bff2f3aec5c0e3d70629fbe368c97ee5f03a2afe6cd.svg',
            'color' => '#5ab809'
        ],
        [
            'name' => 'Voleur',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/rogue-bd30dff0abda0512504cb0b5802fb096c363ef02fe3efc803515854edc95fd6e.svg',
            'color' => '#e8da2a'
        ],
        [
            'name' => 'Prêtre',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/priest-dbc208b5a01acfcbbd9fd849df9e467943022aacac49a8ceffaaa914245d1f52.svg',
            'color' => '#ffffff'
        ],
        [
            'name' => 'Chaman',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/shaman-a4610f7adc11a3c837ffb721cd445355e5a4621af4ea9029a4fbba03e60c953b.svg',
            'color' => '#2f36a7'
        ],
        [
            'name' => 'Mage',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/mage-e3cf5fce44262770cfdfa2699de435eac0a15df80907cd8fb937fb33071b997f.svg',
            'color' => '#4ee0e6'
        ],
        [
            'name' => 'Démoniste',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/warlock-858b37a0ff36dd140629d8bccc256e18891617313cab8f2feb68ea5b3f5f4781.svg',
            'color' => '#7c77a9'
        ],
        [
            'name' => 'Moine',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/monk-45e00e923de55aa533a168acb196626cf537bfe8d1e629e44f73f448ad5aeea8.svg',
            'color' => '#0d8b0b'
        ],
        [
            'name' => 'Druide',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/druid-905cdb7b18899ebd1d25653b8d9e494f83b17118d0aa2674187b7103d25de1f2.svg',
            'color' => '#fd820b'
        ],
        [
            'name' => 'Chasseur de démons',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/demon_hunter-5b9cc455f98c02c68f1380e99b6ec823f6a4aa6c62fb6478c334437e1603ee80.svg',
            'color' => '#9959e0'
        ],
        [
            'name' => 'Chevalier de la mort',
            'image' => 'https://legion.herodamage.com/assets/wowclasspicker/death_knight-6dd4a26d545dea4e011150e4f56d261520d253112ff5e6ba7249f085e749a397.svg',
            'color' => '#d21b20'
        ],

    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::CLASSES as $data) {
            $classe = new Classe();
            $classe
                ->setName($data['name'])
                ->setLinkImage($data['image'])
                ->setColor($data['color']);

            $manager->persist($classe);
        }

        $manager->flush();
    }

}
