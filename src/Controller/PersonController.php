<?php

namespace App\Controller;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonController extends AbstractController
{
    private $PersonRepository;
        
    public function __construct(PersonRepository $PersonRepository){
        $this->PersonRepository= $PersonRepository;
    }
    
    /**
     * @Route("/person", name="person")
     */
    public function index(): Response
    {
        return $this->render('person/index.html.twig', [
            'persons' => $this->PersonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/person/{id}", name="person-detail")
     */
    public function detail(Person $person): Response
    {
        return $this->render('person/detail.html.twig', [
            'person' => $person,
        ]);
    }
}
