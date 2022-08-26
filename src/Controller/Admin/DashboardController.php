<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

#[IsGranted('ROLE_ADMIN')]

class DashboardController extends AbstractDashboardController
{
public function __construct(private AdminUrlGenerator $adminUrlGenerator)
{
    
}

    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
$url=$this->adminUrlGenerator
->setController(ProjectCrudController::class)
->generateUrl();
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($url);

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bluedrop Mobi');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Dashboard', 'fa fa-home');
        yield MenuItem::section('Project');
        yield MenuItem::subMenu("Actions",'fas fa-bars')->setSubItems([
        MenuItem::linkToCrud('Add Project','fas fa-plus',Project::class)->setAction(Crud::PAGE_NEW),
        MenuItem::linkToCrud('Show Projects','fas fa-eye',Project::class)
        ]);
        yield MenuItem::section('Orders');
        yield MenuItem::subMenu("Actions", 'fas fa-bars')->setSubItems([
                MenuItem::linkToCrud('Create Order', 'fas fa-plus', Order::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Show Orders', 'fas fa-eye', Order::class)
            ]);


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
