<?php

namespace App\Form;

use App\Entity\Autores;
use App\Entity\Editorial;
use App\Entity\Libro;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AutoresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('libro', EntityType::class, [
                'class' => Libro::class,
                'choice_label' => 'id',
            ])
            ->add('editorial', EntityType::class, [
                'class' => Editorial::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Autores::class,
        ]);
    }
}
