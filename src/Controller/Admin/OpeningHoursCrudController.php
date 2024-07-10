<?php 

namespace App\Controller\Admin;

use App\Entity\OpeningHours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class OpeningHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningHours::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id', 'ID')->hideOnForm();
        yield TextField::new('day', 'Jour');
        yield TimeField::new('open_time_am', 'Ouverture Matin');
        yield TimeField::new('close_time_am', 'Fermeture Matin');
        yield TimeField::new('open_time_pm', 'Ouverture Après-midi');
        yield TimeField::new('close_time_pm', 'Fermeture Après-midi');
    }
}
