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

    /**
     * Forcé la méthode DELETE permet de sécuriser la suppresion, si il s'agissait d'une simple route GET, le partage d'un lien pourrait supprimer une voiture.
     * Ici, on force la méthode DELETE, ce qui oblige à passer par un formulaire pour supprimer une voiture.
     * Pour pouvoir utiliser le champs caché de type DELETE, il faut ajouter un input de type hidden avec le nom _method et la valeur DELETE.
     * Aussi il faut spécifier dans config/packages/framework.yaml la clé http_method_override à true dans la clé framework. 
     */
    #[Route('/supprimer/{id}', name: 'delete', methods: ["DELETE"], requirements: ['id' => Requirement::DIGITS])]
    public function delete(Car $car): Response
    {
        $this->em->remove($car);
        $this->em->flush();

        return $this->redirectToRoute('home_index');
    }
}
