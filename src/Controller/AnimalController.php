<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    /**
     * @Route("/animals", name="animals-list")
     */
    public function index(AnimalRepository $repository): Response
    {
        $animals = $repository->findAll();
        return $this->render('animal/index.html.twig', [
            "animals" => $animals
        ]);
    }

    /**
     * @Route("/animals/{id}", name="animal-detail")
     */
    public function animalDetail(Animal $animal): Response
    {
        return $this->render('animal/detail.html.twig', [
            "animal" => $animal
        ]);
    }
}
