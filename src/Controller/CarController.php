<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('/voiture', name: "car_")]
final class CarController extends AbstractController
{
    #[Route('/{id}', name: 'show', requirements: ['id' => Requirement::DIGITS])]
    public function show(): Response
    {
        return $this->render('car/show.html.twig', []);
    }

    #[Route('/ajouter', name: 'create')]
    public function create(): Response
    {
        return $this->render('car/create.html.twig', []);
    }
}
