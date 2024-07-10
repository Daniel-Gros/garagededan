<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minPrice', NumberType::class, [
                'label' => 'Prix minimum en €',
                'required' => false,
                'attr' => [
                    'min' => 0,
                    'max' => 100000
                ]
            ])
            ->add('maxPrice', NumberType::class, [
                'label' => 'Prix maximum en €  ',
                'required' => false,
                'attr' => [
                    'min' => 0,
                    'max' => 100000
                ]
            ])
            ->add('minYear', DateType::class, [
                'label' => 'Année minimum',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'y',
                'html5' => false,
                'attr' => [
                    'min' => 1900,
                    'max' => 2024,
                    'type' => 'number',
                    'pattern' => '[0-9]{4}',
                ],
            ])
            ->add('maxYear', DateType::class, [
                'label' => 'Année maximum',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'y',
                'html5' => false,
                'attr' => [
                    'min' => 1900,
                    'max' => 2024,
                    'type' => 'number',
                    'pattern' => '[0-9]{4}',
                ],
            ])
            ->add('minKm', NumberType::class, [
                'label' => 'Kilométrage minimum',
                'required' => false,
                'attr' => [
                    'min' => 0,
                    'max' => 500000,
                    'pattern' => '[0-9]{7}',
                ]
            ])
            ->add('maxKm', NumberType::class, [
                'label' => 'Kilométrage maximum',
                'required' => false,
                'attr' => [
                    'min' => 0,
                    'max' => 500000,
                    'pattern' => '[0-9]{7}',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
