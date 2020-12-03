<?php

namespace App\Controller\Admin\Crud;

use App\Entity\DungeonBoost;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DungeonBoostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DungeonBoost::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('customer', 'Client'),
            IntegerField::new('amount', 'Montant'),
            TextField::new('comment'),
            DateField::new('date'),
            AssociationField::new('armorType', 'Armure'),
            AssociationField::new('dungeon'),
            AssociationField::new('keyDifficulty', 'Clé'),
            AssociationField::new('tank'),
            AssociationField::new('heal'),
            AssociationField::new('dpsOne', 'Dps'),
            AssociationField::new('dpsTwo', 'Dps'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['id', 'customer', 'amount', 'comment', 'date', 'armorType.type', 'dungeon.name', 'keyDifficulty.difficulty', 'tank.pseudo', 'heal.pseudo', 'dpsOne.pseudo', 'dpsTwo.pseudo' ]);
    }
}
