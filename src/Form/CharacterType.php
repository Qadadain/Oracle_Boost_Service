<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Classe;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => 'Nom du perso :'
            ])
            ->add('iLvl', IntegerType::class, [
                'label' => 'Ilvl :'
            ])
            ->add('comment', TextEditorType::class, [
                'label' => 'Commentaire :'
            ])
            ->add('classe', EntityType::class, [
                'label' => 'Classe :',
                'class' => Classe::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
