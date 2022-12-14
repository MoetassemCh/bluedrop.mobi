<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use App\Entity\User;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class OrderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Order::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInPlural('Orders')
        ->setEntityLabelInSingular('Order')
        ->setPageTitle("index", 'Order-Information');
    }
    

    public function configureFields(string $pageName): iterable
    {
        
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('user'),
            TextField::new('ProjectName'),
            DateTimeField::new('updatedAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),
            ChoiceField::new('status')->setChoices([
                'progrès'=> 'progrès',
                'fini'=> 'fini',
                'rejeté'=> 'rejeté'
            ])->renderAsBadges([
                'progrès' => 'warning',
                'fini' => 'success',
                'rejeté' => 'danger'
            ])

        ];
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Order) return;

        $entityInstance->setCreatedAt(new DateTimeImmutable);

        parent::persistEntity($entityManager, $entityInstance);
    }


    public function updateEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Order) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);
        parent::updateEntity($em, $entityInstance);
    }
     
}
