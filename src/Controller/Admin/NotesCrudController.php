<?php

namespace App\Controller\Admin;

use App\Entity\Notes;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NotesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Notes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('ticket'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            TextEditorField::new('text'),
        ];
    }



public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
{
        if (!$entityInstance instanceof Notes) return;

        $entityInstance->setCreatedAt(new DateTimeImmutable);

        parent::persistEntity($entityManager, $entityInstance);
}

   public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
   {
        if (!$entityInstance instanceof Notes) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);
   }

}
