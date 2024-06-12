<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Votre nom',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
            ])
            ->add('phone', TextType::class, [
                'label' => 'Votre numéro de téléphone',
            ])
            ->add('subject', ChoiceType::class, [
                'label' => 'Sujet',
                'choices' => [
                    'Renseignements sur la vente du véhicule' => 'Renseignements sur la vente de véhicule',
                    'Carosserie et Peinture' => 'Carosserie et Peinture',
                    'Petit entretien' => 'Petit entretien',
                    'Remplacement ou réparation du pare-brise' => 'Remplacement ou réparation du pare-brise',
                    'Démarches administratives' => 'Démarches administratives',
                    'Réparation importante et gros oeuvre' => 'Réparation importante et gros oeuvre',
                    'Autre' => 'Autre',
                ],
                'placeholder' => 'Choisissez un sujet',
                'multiple' => false,
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
            ])
            ->add('carId', HiddenType::class, [
                'data' => $options['car_id'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'subject' => '',
            'car_id' => null,
        ]);
    }
}
