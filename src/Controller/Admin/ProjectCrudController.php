<?php

namespace App\Controller\Admin;

use DateTimeImmutable;
use App\Entity\Project;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectCrudController extends AbstractCrudController
{
    public const ACTION_DUPLICATE = 'duplicate';
    public const PUBLICS_BASE_PATH = 'upload/images/project';
    public const PUBLICS_UPLOAD_DIR = 'public/upload/images/project';

    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

  public function configureCrud(Crud $crud): Crud
  {
    return $crud
    ->setEntityLabelInPlural('Projects')
    ->setEntityLabelInSingular('Project')
    ->setPageTitle("index",'Project-Information');
  }

    public function configureActions(Actions $actions): Actions
    {
        $duplicate = Action::new(self::ACTION_DUPLICATE)
            ->linkToCrudAction('duplicatedProject')
            ->setCssClass('btn btn-warning');

        return $actions
            ->add(Crud::PAGE_EDIT, $duplicate)
            ->reorder(Crud::PAGE_EDIT, [self::ACTION_DUPLICATE, Action::SAVE_AND_RETURN]);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('service'),
            TextEditorField::new('description'),
            ImageField::new('image')
                ->setBasePath(self::PUBLICS_BASE_PATH)
                ->setUploadDir(self::PUBLICS_UPLOAD_DIR)
                ->setSortable(false),
            MoneyField::new('cost')->setCurrency('EUR'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm()
         
        ];

    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Project) return;

        $entityInstance->setCreatedAt(new DateTimeImmutable);

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Project) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);
        parent::updateEntity($em, $entityInstance);
    }


    public function duplicatedProject(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $em
    ): Response {
        /** @var Project $project */
        $project = $context->getEntity()->getInstance();

        $duplicatedProject = clone $project;

        parent::persistEntity($em, $duplicatedProject);

        $url = $adminUrlGenerator->setController(self::class)
            ->setAction(Action::DETAIL)
            ->setEntityId($duplicatedProject->getId())
            ->generateUrl();

        return $this->redirect($url);
    }
}
