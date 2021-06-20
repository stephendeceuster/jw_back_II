<?php

namespace App\Controller\Admin;

use App\Entity\PhotoCategories;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PhotoCategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PhotoCategories::class;
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

        return [
            IdField::new('id')->hideOnIndex()->hideOnForm(),
            TextField::new('title'),
            SlugField::new('slug')->setTargetFieldName('title'),
            TextEditorField::new('description'),
            $thumbShown,
            BooleanField::new('published'),
            NumberField::new('sorting')
        ];
    }
    
}
