<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $a1 = new Animal();
        $a1-> setName("Chien")
            ->setDescription("Un chien")
            ->setPicture("chien.png")
            ->setWeight(10)
            ->setIsDangerous(false);
        $manager->persist($a1);

        $a2 = new Animal();
        $a2-> setName("Serpent")
            ->setDescription("Un serpent")
            ->setPicture("serpent.png")
            ->setWeight(3)
            ->setIsDangerous(true);
        $manager->persist($a2);

        $a3 = new Animal();
        $a3-> setName("Crocodile")
            ->setDescription("Un crocodile")
            ->setPicture("crocodile.png")
            ->setWeight(150)
            ->setIsDangerous(true);
        $manager->persist($a3);

        $a4 = new Animal();
        $a4-> setName("Requin")
            ->setDescription("Un requin")
            ->setPicture("requin.png")
            ->setWeight(500)
            ->setIsDangerous(true);
        $manager->persist($a4);

        $a5 = new Animal();
        $a5-> setName("Cochon")
            ->setDescription("Un cochon")
            ->setPicture("cochon.png")
            ->setWeight(250)
            ->setIsDangerous(false);
        $manager->persist($a5);

        $manager->flush();
    }
}
