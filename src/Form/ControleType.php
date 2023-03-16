<?php

namespace App\Form;

use App\Entity\Controle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ControleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mode', CheckboxType::class, ['label' => 'Mode automatique : '])
            ->add('tempConsigne', TextType::class, ['label' => 'Température de consigne : '] )
            ->add('SoilHumidity', TextType::class, ['label' => 'Humidité minimum : '])
            ->add('arrosage', ButtonType::class, ['label' => 'Arrosage '])
            ->add('ventilation', ButtonType::class, ['label' => 'Ventilation '])
            ->add('Enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Controle::class,
        ]);
    }
}
