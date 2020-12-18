<?php

namespace App\Form;

use App\Entity\ArmorType;
use App\Entity\RaidBoost;
use App\Entity\RaidOffer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RaidBoostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customer', TextType::class, [
                'label' => 'Client :'
            ])
            ->add('amount', IntegerType::class, [
                'label' => 'Montant :'
            ])
            ->add('comment', TextType::class, [
                'label' => 'Commentaire :',
                'required' => false,
            ])
            ->add('date', DateType::class, [
                'label' => 'Date :',
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('armorType', EntityType::class, [
                'label' => 'Armure :',
                'class' => ArmorType::class,
                'choice_label' => 'type',
                'expanded' => true,
                'multiple' => false
            ])
            ->add('raidOffer', EntityType::class, [
                'label' => 'Offre :',
                'class' => RaidOffer::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RaidBoost::class,
        ]);
    }
}
