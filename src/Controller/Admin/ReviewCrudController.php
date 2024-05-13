<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nickname', 'Pseudonyme :');
        yield ChoiceField::new('score', 'Note:')
            ->setChoices(['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'])
            ->renderExpanded();
            yield TextareaField::new('message', 'Votre message :');
            yield BooleanField::new('approved', 'Approuver ?')->hideOnIndex();
            yield AssociationField::new('users', 'Utilisateur')->hideOnIndex();
    }
    
}
