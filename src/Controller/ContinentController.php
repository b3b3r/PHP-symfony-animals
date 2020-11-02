<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContinentController extends AbstractController
{
    /**
     * @Route("/continents", name="continents")
     */
    public function index(ContinentRepository $repository): Response
    {
        $continents= $repository->findAll();
        return $this->render('continent/index.html.twig', [
            'continents' => $continents,
        ]);
    }

    /**
     * @Route("/continent/{id}", name="continent-detail")
     */
    public function detail(Continent $continent): Response
    {
        return $this->render('continent/detail.html.twig', [
            'continent' => $continent,
        ]);
    }
}
