<?php

namespace App\DataFixtures;


use App\Entity\DungeonBoost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class DungeonBoostFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [ArmorTypeFixtures::class, DungeonFixtures::class, KeyDifficultyFixtures::class, CharacterFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i < 21; $i++) {
            $customer = $faker->firstName;
            $amount = random_int(100000, 150000);
            $armorId = random_int(1,4);
            $dungeonId = random_int(1, 8);
            $keyId = random_int(1,10);
            $dungeonBoost = new DungeonBoost();
            $dungeonBoost
                ->setCustomer($customer)
                ->setAmount($amount);
            $dungeonBoost->setArmorType($manager->find('App:ArmorType', $armorId));
            $dungeonBoost->setDungeon($manager->find('App:Dungeon', $dungeonId));
            $dungeonBoost->setKeyDifficulty($manager->find('App:KeyDifficulty', $keyId));
            $dungeonBoost->setTank($manager->find('App:Character', random_int(1,7)));
            $dungeonBoost->setHeal($manager->find('App:Character', random_int(1,7)));
            $dungeonBoost->setDpsOne($manager->find('App:Character', random_int(1,7)));
            $dungeonBoost->setDpsTwo($manager->find('App:Character', random_int(1,7)));
            $manager->persist($dungeonBoost);
        }

        $manager->flush();
    }

}
