<?php

namespace App\Controller\Admin\Crud;

use App\Entity\KeyDifficulty;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class KeyDifficultyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return KeyDifficulty::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('difficulty'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['id', 'difficulty']);
    }
}
