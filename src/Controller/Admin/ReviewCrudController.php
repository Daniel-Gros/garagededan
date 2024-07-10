<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Doctrine\ORM\EntityManagerInterface;

class ReviewCrudController extends AbstractCrudController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return Review::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nickname', 'Pseudonyme :')
        ->setFormTypeOption('disabled', true);
        yield ChoiceField::new('score', 'Note:')
            ->setChoices(['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'])
            ->renderExpanded()
            ->setFormTypeOption('disabled', true);
        yield TextareaField::new('message', 'Votre message :')
        ->setFormTypeOption('disabled', true);
        yield BooleanField::new('approved', 'Valider?');
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityInstance->setApproved(true);
        parent::updateEntity($entityManager, $entityInstance);
    }
}
