<?php

namespace App\Form;

use App\Entity\ArmorType;
use App\Entity\Character;
use App\Entity\Dungeon;
use App\Entity\DungeonBoost;
use App\Entity\KeyDifficulty;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DungeonBoostType extends AbstractType
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
            ->add('dungeon', EntityType::class, [
                'label' => 'Donjon :',
                'class' => Dungeon::class,
                'choice_label' => 'name'
            ])
            ->add('keyDifficulty', EntityType::class, [
                'label' => 'Clé :',
                'class' => KeyDifficulty::class,
                'choice_label' => 'difficulty'
            ])
            ->add('tank', EntityType::class, [
                'label' => 'Tank :',
                'class' => Character::class,
                'choice_label' => 'pseudo',
            ])
            ->add('heal', EntityType::class, [
                'label' => 'Heal :',
                'class' => Character::class,
                'choice_label' => 'pseudo',
            ])
            ->add('dpsOne', EntityType::class, [
                'label' => 'DPS :',
                'class' => Character::class,
                'choice_label' => 'pseudo',
            ])
            ->add('dpsTwo', EntityType::class, [
                'label' => 'DPS :',
                'class' => Character::class,
                'choice_label' => 'pseudo',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DungeonBoost::class,
        ]);
    }
}
