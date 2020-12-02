<?php

namespace App\Controller\Admin\Crud;

use App\Entity\InformationBoost;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InformationBoostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InformationBoost::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('amountDungeonBoost'),
            IntegerField::new('stackArmorAmount'),
            TextField::new('messageInformation'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['id', 'amountDungeonBoost', 'stackArmorAmount', 'messageInformation']);
    }
}
