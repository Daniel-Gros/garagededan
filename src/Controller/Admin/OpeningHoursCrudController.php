<?php

namespace App\Controller\Admin;

use App\Entity\OpeningHours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OpeningHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningHours::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield from [
            IdField::new('id')->hideOnForm(),
            TextField::new('day'),
            TextEditorField::new('open_time_am'),
            TextEditorField::new('close_time_am'),
            TextEditorField::new('open_time_pm'),
            TextEditorField::new('close_time_pm'),
        ];
    }
    
}
