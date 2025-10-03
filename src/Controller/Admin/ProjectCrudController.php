<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInSingular('Projet')
            ->setEntityLabelInPlural('Projets')
            ->setPageTitle('index', 'Projets');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')
                ->setBasePath('build/images/project')   // chemin pour afficher l'image
                ->setUploadDir('public/build/images/project') // dossier où l'image sera enregistrée
                ->setUploadedFileNamePattern('[randomhash].[extension]') // optionnel : nom aléatoire
                ->setRequired(false),
            TextField::new('companyName', 'Nom de l\'entreprise'),
            TextField::new('companyType', 'Type d\'entreprise'),
            TextEditorField::new('content', 'Contenu'),
            TextField::new('link', 'Lien'),
            BooleanField::new('isFinished', 'Terminé'),
            BooleanField::new('isPublished', 'Publié'),
            DateTimeField::new('createdAt', 'Créé le')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Modifié le')->hideOnForm(),
        ];
    }
}
