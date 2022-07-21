<?php

namespace App\DataFixtures;

use App\Entity\LolProfile;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail($faker->email());
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                'password'
            );
            $user->setPassword($hashedPassword);
            $user->setNickname($faker->userName());

            $lolProfile = new LolProfile();
            $lolProfile->setUser($user);
            $lolProfile->setSummonerName("non renseigné");
            $user->addLolProfile($lolProfile);

            $manager->persist($user);
            $manager->persist($lolProfile);
        }

        $manager->flush();
    }
}
