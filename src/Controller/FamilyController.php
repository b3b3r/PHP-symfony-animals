<?php

namespace App\Controller;

use App\Entity\Family;
use App\Repository\FamilyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FamilyController extends AbstractController
{
    /**
     * @Route("/family", name="family")
     */
    public function index(FamilyRepository $repository): Response
    {
        $families = $repository->findAll();
        return $this->render('family/index.html.twig', [
            'families' => $families,
        ]);
    }

    /**
     * @Route("/family/{id}", name="family-detail")
     */
    public function detail(Family $family): Response
    {
        return $this->render('family/detail.html.twig', [
            'family' => $family,
        ]);
    }
}
