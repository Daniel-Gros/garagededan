<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
            yield IdField::new('id', 'ID')->hideOnForm();
            yield TextField::new('name', 'Nom');
            yield TextField::new('email', 'Email');
            yield TextField::new('phone', 'Téléphone');
            yield TextField::new('subject', 'Sujet');
            yield TextEditorField::new('message', 'Message');
    }
    
}
