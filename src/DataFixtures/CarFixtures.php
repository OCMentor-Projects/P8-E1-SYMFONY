<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $publicImagePath = "public/uploads/cars/";

        $cars = [
            ["brand" => "Renault", "model" => "Twingo", "dailyPrice" => 39.14, "monthlyPrice" => 900.00, "kilometer" => null, "image" => ""],
            ["brand" => "Renault", "model" => "Clio", "dailyPrice" => 38.64, "monthlyPrice" => 850.00, "kilometer" => 20000, "image" => ""],
            ["brand" => "BMW", "model" => "IX", "dailyPrice" => 42.40, "monthlyPrice" => 950.00, "kilometer" => 10000, "image" => ""],
            ["brand" => "Renault", "model" => "Zoé", "dailyPrice" => 39.14, "monthlyPrice" => 900.00, "kilometer" => null, "image" => $publicImagePath . "renault-zoe.webp"],
            ["brand" => "Citroën", "model" => "Ami", "dailyPrice" => 28.59, "monthlyPrice" => 799.00, "kilometer" => null, "image" => ""],
            ["brand" => "Opel", "model" => "Corsa", "dailyPrice" => 36.38, "monthlyPrice" => 820.00, "kilometer" => null, "image" => $publicImagePath . "opel-corsa.webp"],
        ];

        foreach ($cars as $data) {
            $car = new Car();
            $car->setBrand($data["brand"]);
            $car->setModel($data["model"]);
            $car->setDailyPrice($data["dailyPrice"]);
            $car->setMonthlyPrice($data["monthlyPrice"]);
            $car->setKilometerMax($data["kilometer"]);
            $car->setImage($data["image"]);
            $manager->persist($car);
        }

        $manager->flush();
    }
}
