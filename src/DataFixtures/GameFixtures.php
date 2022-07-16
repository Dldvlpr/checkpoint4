<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Game;
use Faker\Factory;

class GameFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $game = new Game();

        $game->setName('game');

        $manager->persist($game);

        $manager->flush();
    }
}
