<?php

namespace App\Controller;

use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('/voiture', name: "car_")]
final class CarController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em) {}

    #[Route('/{id}', name: 'show', requirements: ['id' => Requirement::DIGITS])]
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', compact('car'));
    }

    #[Route('/ajouter', name: 'create')]
    public function create(): Response
    {
        return $this->render('car/create.html.twig', []);
    }

    #[Route('/supprimer/{id}', name: 'delete', methods: ["DELETE"], requirements: ['id' => Requirement::DIGITS])]
    public function delete(Car $car): Response
    {
        $this->em->remove($car);
        $this->em->flush();

        return $this->redirectToRoute('home_index');
    }
}
