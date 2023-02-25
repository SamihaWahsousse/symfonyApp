<?php

namespace App\Controller\Admin;

use App\Entity\Joke;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JokeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Joke::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->hideOnForm(),
            TextField::new('joke'),
            TextField::new('category'),
        ];
    }
}
