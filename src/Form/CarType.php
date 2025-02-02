<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', TextType::class, [
                "label" => "Marque",
                "row_attr" => ["class" => "input"]
            ])
            ->add('model', TextType::class, [
                "label" => "Modèle",
                "row_attr" => ["class" => "input"]
            ])
            ->add('monthlyPrice', NumberType::class, [
                "label" => "Prix mensuel",
                "row_attr" => ["class" => "input"]
            ])
            ->add('dailyPrice', NumberType::class, [
                "label" => "Prix journalier",
                "row_attr" => ["class" => "input"]
            ])
            ->add('seat', ChoiceType::class, [
                "label" => "Nombre de places",
                "choices" => [
                    "1" => 1,
                    "2" => 2,
                    "3" => 3,
                    "4" => 4,
                    "5" => 5,
                    "6" => 6,
                    "7" => 7,
                    "8" => 8,
                    "9" => 9,
                ],
                "row_attr" => ["class" => "input"]
            ])
            ->add('kilometerMax', NumberType::class, [
                "label" => "Kilométrage maximal",
                "attr" => ["value" => 0],
                "row_attr" => ["class" => "input"]
            ])
            ->add('description', TextareaType::class, [
                "label" => "Description",
                "row_attr" => ["class" => "input"]
            ])
            ->add('gearType', ChoiceType::class, [
                "label" => "Type de transmission",
                "choices" => [
                    "Manuelle" => "Manuelle",
                    "Automatique" => "Automatique"
                ],
                "row_attr" => ["class" => "input"]
            ])
            ->add('save', SubmitType::class, [
                "label" => "Ajouter",
                "attr" => ["class" => "btn-add"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
