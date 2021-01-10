<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Family;
use App\Entity\Continent;
use App\Entity\HaveAnimal;
use App\Entity\Person;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $p1 = new Person();
        $p1->setName("Michel");
        $manager->persist($p1);

        $p2 = new Person();
        $p2->setName("Lili");
        $manager->persist($p2);
        
        $p3 = new Person();
        $p3->setName("Beber");
        $manager->persist($p3);

        $c1 = new Continent();
        $c1->setName("Europe");
        $manager->persist($c1);

        $c2 = new Continent();
        $c2->setName("Asie");
        $manager->persist($c2);

        $c3 = new Continent();
        $c3->setName("Afrique");
        $manager->persist($c3);

        $c4 = new Continent();
        $c4->setName("Amérique");
        $manager->persist($c4);

        $c5 = new Continent();
        $c5->setName("Océanie");
        $manager->persist($c5);

        $f1 =new Family();
        $f1->setName("mammifère")
           ->setDescription("Animaux vertébrés nourrissant leurs petits avec du lait");
        $manager->persist($f1);

        $f2 =new Family();
        $f2->setName("reptiles")
            ->setDescription("Animaux vertébrés qui rampent");
        $manager->persist($f2);

        $f3 =new Family();
        $f3->setName("poissons")
            ->setDescription("Animaux invertébrés du monde aquatique");
        $manager->persist($f3);

        $a1 = new Animal();
        $a1-> setName("Chien")
            ->setDescription("Un chien")
            ->setPicture("chien.png")
            ->setWeight(10)
            ->setIsDangerous(false)
            ->setFamily($f1)
            ->addContinent($c1)
            ->addContinent($c2)
            ->addContinent($c3)
            ->addContinent($c4)
            ->addContinent($c5);
        $manager->persist($a1);

        $a2 = new Animal();
        $a2-> setName("Serpent")
            ->setDescription("Un serpent")
            ->setPicture("serpent.png")
            ->setWeight(3)
            ->setIsDangerous(true)
            ->setFamily($f2)
            ->addContinent($c1)
            ->addContinent($c2)
            ->addContinent($c3)
            ->addContinent($c4)
            ->addContinent($c5);
        $manager->persist($a2);

        $a3 = new Animal();
        $a3-> setName("Crocodile")
            ->setDescription("Un crocodile")
            ->setPicture("crocodile.png")
            ->setWeight(150)
            ->setIsDangerous(true)
            ->setFamily($f2)
            ->addContinent($c2)
            ->addContinent($c3)
            ->addContinent($c4)
            ->addContinent($c5);
        $manager->persist($a3);

        $a4 = new Animal();
        $a4-> setName("Requin")
            ->setDescription("Un requin")
            ->setPicture("requin.png")
            ->setWeight(500)
            ->setIsDangerous(true)
            ->setFamily($f3)
            ->addContinent($c2)
            ->addContinent($c3)
            ->addContinent($c4)
            ->addContinent($c5);;
        $manager->persist($a4);

        $a5 = new Animal();
        $a5-> setName("Cochon")
            ->setDescription("Un cochon")
            ->setPicture("cochon.png")
            ->setWeight(250)
            ->setIsDangerous(false)
            ->setFamily($f1)
            ->addContinent($c1)
            ->addContinent($c2)
            ->addContinent($c3)
            ->addContinent($c4)
            ->addContinent($c5);
        $manager->persist($a5);

        $union1 = new HaveAnimal();
        $union1->setPerson($p1)
                ->setAnimal($a1)
                ->setNumber(2);
        $manager->persist($union1);

        $union2 = new HaveAnimal();
        $union2->setPerson($p1)
                ->setAnimal($a5)
                ->setNumber(4);
        $manager->persist($union2);

        $union3 = new HaveAnimal();
        $union3->setPerson($p2)
                ->setAnimal($a2)
                ->setNumber(1);
        $manager->persist($union3);

        $union4 = new HaveAnimal();
        $union4->setPerson($p3)
                ->setAnimal($a3)
                ->setNumber(1);
        $manager->persist($union4);

        $union5 = new HaveAnimal();
        $union5->setPerson($p3)
                ->setAnimal($a4)
                ->setNumber(1);
        $manager->persist($union5);

        $manager->flush();
    }
}
