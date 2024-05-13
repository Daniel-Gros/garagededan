<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use PHPUnit\TextUI\XmlConfiguration\File;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $mappingsParams = $this->getParameter('vich_uploader.mappings');

        $carImagesPath = $mappingsParams['car']['uri_prefix'];


        yield DateField::new('year', 'Année');
        yield IntegerField::new('price', 'Prix');
        yield IntegerField::new('kilometers', 'Kilométrage');
        yield AssociationField::new('brand', 'Marque');
        yield AssociationField::new('models', 'Modèle');
        yield AssociationField::new('color', 'Couleur');
        yield AssociationField::new('sit', 'Nombre de sièges');
        yield AssociationField::new('door', 'Nombre de portes');
        yield AssociationField::new('power', 'Puissance');
        yield AssociationField::new('din_power', 'Puissance fiscale (DIN)');
        yield AssociationField::new('energy', 'Type de carburant');
        yield TextareaField::new('imageFile', 'Photo du véhicule')->setFormType(VichImageType::class)->hideOnIndex();
        yield ImageField::new('image', 'Photo du véhicule')->setBasePath($carImagesPath)->hideOnForm();
    }
}
