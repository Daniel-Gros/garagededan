<?php

namespace App\Form;

use App\Entity\OpeningHours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpeningHoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day')
            ->add('open_time_am', null, [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('close_time_am', null, [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('open_time_pm', null, [
                'widget' => 'single_text',
                'required' => false,
                'empy_data' => null,
            ])
            ->add('close_time_pm', null, [
                'widget' => 'single_text',
                'required' => false,
                'empty_data' => null,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OpeningHours::class,
        ]);
    }
}
