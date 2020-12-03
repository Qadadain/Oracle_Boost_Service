<?php

namespace App\DataFixtures;

use App\Entity\RaidOffer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RaidOfferFixtures extends Fixture
{
    public const OFFERS = [
        [
            'offerType' => 'Raid 12/12 HM'
        ],
        [
            'offerType' => 'Raid 12/12 MM'
        ],
        [
            'offerType' => 'Raid 1 Boss MM'
        ],
        [
            'offerType' => 'Raid 3 Boss MM'
        ],
        [
            'offerType' => 'Raid 6 Boss MM'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::OFFERS as $data) {
            $raidOffer = new RaidOffer();
            $raidOffer
                ->setOfferType($data['offerType']);
            $manager->persist($raidOffer);
        }

        $manager->flush();
    }
}
