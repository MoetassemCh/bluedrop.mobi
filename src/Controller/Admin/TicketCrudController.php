<?php

namespace App\Controller\Admin;

use App\Entity\Ticket;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class TicketCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ticket::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('contenu'),
            AssociationField::new('user')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm()
        ];
    }


 public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
 {
        if (!$entityInstance instanceof Ticket) return;

        $entityInstance->setCreatedAt(new DateTimeImmutable);

        parent::persistEntity($entityManager, $entityInstance);
 }


public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
{
        if (!$entityInstance instanceof Ticket) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);
        
}


}