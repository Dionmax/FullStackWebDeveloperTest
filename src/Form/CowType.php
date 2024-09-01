<?php

namespace App\Form;

use App\Entity\Cow;
use App\Entity\Farm;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('milkProduction')
            ->add('weeklyFeed')
            ->add('weight')
            ->add('birth', null, [
                'widget' => 'single_text',
            ])
            ->add('Slaughtered')
            ->add('farm', EntityType::class, [
                'class' => Farm::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cow::class,
            'constraints' => [
                new UniqueEntity(['fields' => 'id']),
            ],
        ]);
    }
}
