<?php 

namespace App\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('minYear', NumberType::class, [
                'label' => 'Année minimum',
                'required' => false,
                'attr' => [
                    'min' => 1900,
                    'max' => 2024
                ]
            ])
            ->add('maxYear', NumberType::class, [
                'label' => 'Année maximum',
                'required' => false,
                'attr' => [
                    'min' => 1900,
                    'max' => 2024
                ]
            ])
            ->add('minKm', NumberType::class, [
                'label' => 'Kilométrage minimum',
                'required' => false,
                'attr' => [
                    'min' => 0,
                    'max' => 500000
                ]
            ])
            ->add('maxKm', NumberType::class, [
                'label' => 'Kilométrage maximum',
                'required' => false,
                'attr' => [
                    'min' => 0,
                    'max' => 500000
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}