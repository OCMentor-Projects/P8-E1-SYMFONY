<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'home_')]
final class HomeController extends AbstractController
{
    public function __construct(private CarRepository $carRepository) {}

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $cars = $this->carRepository->findAll();

        return $this->render('home/index.html.twig', [
            "cars" => $cars
        ]);
    }
}
