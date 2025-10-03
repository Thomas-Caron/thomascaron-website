<?php

namespace App\Controller\Admin;

use App\Entity\About;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class AboutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return About::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInSingular('À propos')
            ->setEntityLabelInPlural('À propos')
            ->setPageTitle('index', 'À propos');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')
                ->setBasePath('build/images/about')
                ->setUploadDir('public/build/images/about')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextEditorField::new('content', 'Contenu'),
            DateTimeField::new('createdAt', 'Créé le')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Modifié le')->hideOnForm(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable('new', 'delete');
    }
}
