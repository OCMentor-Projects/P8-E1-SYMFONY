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
            ["brand" => "Renault", "model" => "Twingo", "dailyPrice" => 39.14, "monthlyPrice" => 900.00, "kilometer" => null, "description" => "Renault est reconnu pour ses véhicules compacts et ingénieux - la Renault Twingo ne fait pas exception. Conçue pour la vie urbaine, elle propose une motorisation idéale pour les trajets quotidiens, allant d'environ 70 ch en version économique à 90 ch dans ses déclinaisons plus dynamiques. Grâce à son design astucieux, sa maniabilité exceptionnelle et ses technologies modernes, la Twingo allie praticité, économie et plaisir de conduire en ville."],
            ["brand" => "Renault", "model" => "Clio", "dailyPrice" => 38.64, "monthlyPrice" => 850.00, "kilometer" => 20000, "description" => "Renault est reconnu pour ses véhicules accessibles et ingénieux - la Renault Clio ne fait pas exception. Dotée d'une motorisation allant de 90 ch en version économique à 130 ch dans ses déclinaisons plus sportives, la Renault Clio allie performance et économie de carburant. Grâce à son design moderne et ses technologies innovantes, cette citadine offre une expérience de conduite dynamique et confortable, parfaitement adaptée à la vie urbaine comme aux escapades sur route."],
            ["brand" => "BMW", "model" => "IX", "dailyPrice" => 42.40, "monthlyPrice" => 950.00, "kilometer" => 10000, "description" => "BMW est connu pour ses voitures puissantes et luxueuses - la BMW iX ne fait pas exception. Avec une puissance allant de 326 ch (BMW iX 40) à 523 ch (BMW iX 50) et une autonomie de 408 (BMW iX 40) à 590 kilomètres (BMW iX 50), la BMW iX offre tout ce que l'on peut attendre d'une voiture électrique."],
            ["brand" => "Renault", "model" => "Zoé", "dailyPrice" => 39.14, "monthlyPrice" => 900.00, "kilometer" => null,  "description" => "Renault est reconnu pour ses véhicules innovants et accessibles - la Renault Zoé ne fait pas exception. Propulsée entièrement à l'électricité, la Renault Zoé offre une motorisation variant de 80 ch en version standard à 108 ch en version intensifiée, alliant performance et efficacité énergétique. Avec une autonomie pouvant atteindre jusqu'à 395 kilomètres selon le cycle WLTP, la Renault Zoé incarne parfaitement l'alliance entre modernité, praticité et respect de l'environnement."],
            ["brand" => "Citroën", "model" => "Ami", "dailyPrice" => 28.59, "monthlyPrice" => 799.00, "kilometer" => null, "description" => "Citroën est reconnu pour ses innovations audacieuses et son approche décalée de la mobilité - la Citroën Ami ne fait pas exception. Conçue comme une solution de mobilité électrique ultra-compacte pour la vie urbaine, elle propose une motorisation adaptée aux trajets courts avec une autonomie d'environ 75 kilomètres en mode électrique. Grâce à son design original, sa facilité d'utilisation et son caractère économique, la Citroën Ami incarne l'alliance parfaite entre modernité, praticité et respect de l'environnement pour vos déplacements citadins."],
            ["brand" => "Opel", "model" => "Corsa", "dailyPrice" => 36.38, "monthlyPrice" => 820.00, "kilometer" => null,  "description" => "Opel est reconnu pour allier élégance et dynamisme dans ses véhicules - l'Opel Corsa ne fait pas exception. Offrant une motorisation allant d'environ 75 ch en version économique à plus de 110 ch dans ses déclinaisons sportives, l'Opel Corsa propose un parfait compromis entre agilité urbaine et performance sur route. Son design moderne, ses technologies embarquées et sa tenue de route remarquable en font une citadine idéale pour ceux qui recherchent à la fois confort, sécurité et plaisir de conduire."],
        ];

        foreach ($cars as $data) {
            $car = new Car();
            $car->setBrand($data["brand"]);
            $car->setModel($data["model"]);
            $car->setDailyPrice($data["dailyPrice"]);
            $car->setMonthlyPrice($data["monthlyPrice"]);
            $car->setKilometerMax($data["kilometer"]);
            $car->setDescription($data["description"]);
            $manager->persist($car);
        }

        $manager->flush();
    }
}
