<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Project;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractController
{
    private $orderRepository;
    private $em;
    public function __construct(OrderRepository $orderRepository, ManagerRegistry $doctrine)
    {
        $this->orderRepository = $orderRepository;
        $this->em = $doctrine->getManager();
    }
    #[Route('/order', name: 'app_order')]
    public function index(): Response
    {
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
        ]);
    }

    #[Route('/user/orders', name: 'user_order_list')]
    public function userOrders(): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        return $this->render('order/user.html.twig', [
            'user' =>$this->getUser(),
        ]);
    }


    #[Route('/order/{project}', name: 'order_store')]
    public function store(Project $project): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_login');
        }

   $order=new Order();
   $order->setUser($this->getUser());
   $order->setProjectName($project->getService());
   $order->setCreatedAt($order->getCreatedAt());
   $this->em->persist($order); 
   $this->em->flush();
    $this->addFlash(
        'success',
        'your order saved'
    );   
return $this->redirectToRoute('user_order_list');
    }

}
