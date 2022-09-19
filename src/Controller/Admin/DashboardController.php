<?php

namespace App\Controller\Admin;

use App\Entity\Notes;
use App\Entity\Order;
use App\Entity\Project;
use App\Entity\Ticket;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;



class DashboardController extends AbstractDashboardController
{
public function __construct(private AdminUrlGenerator $adminUrlGenerator)
{
    
}

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
$url=$this->adminUrlGenerator
->setController(ProjectCrudController::class)
->generateUrl();

        return $this->redirect($url);
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
        MenuItem::linkToCrud('Add Project','fas fa-plus',Project::class)
        ]);
        yield MenuItem::section('Orders');
        yield MenuItem::subMenu("Actions", 'fas fa-bars')->setSubItems([
                MenuItem::linkToCrud('Create Order', 'fas fa-plus', Order::class)
            ]);

        yield MenuItem::section('Ticket');
        yield MenuItem::subMenu("Actions", 'fas fa-bars')->setSubItems([
                 MenuItem::linkToCrud('Create Ticket', 'fas fa-plus', Ticket::class)
            ]);

             yield MenuItem::section('Notes');
             yield MenuItem::subMenu("Actions", 'fas fa-bars')->setSubItems([
                 MenuItem::linkToCrud('Create Notes', 'fas fa-plus', Notes::class)
            ]);


    }
}
