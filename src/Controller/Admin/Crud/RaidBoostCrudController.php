<?php

namespace App\Controller\Admin\Crud;

use App\Entity\RaidBoost;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Integer;

class RaidBoostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RaidBoost::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('customer'),
            IntegerField::new('amount'),
            TextField::new('comment'),
            DateField::new('date'),
            AssociationField::new('armorType'),
            AssociationField::new('raidOffer')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['id', 'customer', 'amount', 'comment', 'date', 'armorType.type', 'raidOffer.offerType']);
    }
}
