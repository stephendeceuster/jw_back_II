<?php

namespace App\Controller\Admin;

use App\Entity\PhotoCases;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PhotoCasesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PhotoCases::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $thumbFile = TextareaField::new('thumbnailFile')->setFormType(VichImageType::class);
        $thumb = ImageField::new('thumbnail')->setBasePath('/uploads');

        $thumbShown = $thumbFile;
        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL)
        {
            $thumbShown = $thumb;
        }

        $fields = [
            IdField::new('id')->hideOnIndex()->hideOnForm(),
            TextField::new('title'),
            SlugField::new('slug')->setTargetFieldName('title'),
            TextEditorField::new('description'),
            
            $thumbShown,
            
            DateField::new('date')->hideOnIndex(),
            TextField::new('location')->hideOnIndex(),
            
            TextareaField::new('contentImg1File')->setFormType(VichImageType::class)->onlyOnForms(),
            TextareaField::new('contentImg2File')->setFormType(VichImageType::class)->onlyOnForms(),
            TextareaField::new('contentImg3File')->setFormType(VichImageType::class)->onlyOnForms(),
            TextareaField::new('contentImg4File')->setFormType(VichImageType::class)->onlyOnForms(),
            TextareaField::new('contentImg5File')->setFormType(VichImageType::class)->onlyOnForms(),
            TextareaField::new('contentImg6File')->setFormType(VichImageType::class)->onlyOnForms(),

            AssociationField::new('photoCasesCategories')->autocomplete()->onlyOnForms(),
            CollectionField::new('photoCasesCategories')->onlyOnIndex(),
            BooleanField::new('published'),
            NumberField::new('sorting')
        ];

        return $fields;
    }
    
}
