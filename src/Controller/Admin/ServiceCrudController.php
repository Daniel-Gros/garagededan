<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        $mappingsParams = $this->getParameter('vich_uploader.mappings');

        $serviceImagesPath = $mappingsParams['service']['uri_prefix'];
        
            yield IdField::new('id')->hideOnForm();
            yield TextField::new('name' , 'Nom du service');
            yield TextEditorField::new('description');
            yield TextareaField::new('imageFile', 'Photo illustrative du service')->setFormType(VichImageType::class)->hideOnIndex();
            yield ImageField::new('image', 'Photo du service')->setBasePath($serviceImagesPath)->hideOnForm();
    }
    
}
