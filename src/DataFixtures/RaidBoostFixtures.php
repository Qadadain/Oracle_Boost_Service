<?php

namespace App\DataFixtures;

use App\Entity\RaidBoost;
use App\Entity\RaidOffer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class RaidBoostFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [RaidOfferFixtures::class, ArmorTypeFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i < 21; $i++) {
            $customer = $faker->firstName;
            $amount = random_int(100000, 150000);
            $armorId = random_int(1, 4);
            $offerId = random_int(1, 5);
            $raidBoost = new RaidBoost();
            $raidBoost
                ->setCustomer($customer)
                ->setAmount($amount);
            $raidBoost->setArmorType($manager->find('App:ArmorType', $armorId));
            $raidBoost->setRaidOffer($manager->find('App:RaidOffer', $offerId));
            $manager->persist($raidBoost);
        }

        $manager->flush();
    }

}
