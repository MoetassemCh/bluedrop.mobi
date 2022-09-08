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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_USER')]
class OrderController extends AbstractController
{
    private $orderRepository;
    private $em;
    public function __construct(OrderRepository $orderRepository, ManagerRegistry $doctrine)
    {
        $this->orderRepository = $orderRepository;
        $this->em = $doctrine->getManager();
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

        $orderExist=$this->orderRepository->findOneBy([
            'user'=>$this->getUser(),
            'ProjectName'=>$project->getService()
        ]);
if($orderExist){
    $this->addFlash(
        'warning',
        'Vous avez déjà commandé ce projet'
    );
    return $this->redirectToRoute('user_order_list');
}

   $order=new Order();
   $order->setUser($this->getUser());
   $order->setProjectName($project->getService());
   $order->setPrice($project->getCost());
   $order->setCreatedAt($order->getCreatedAt());
   $this->em->persist($order); 
   $this->em->flush();
    // $this->addFlash(
    //     'success',
    //     'your order saved'
    // );   
return $this->redirectToRoute('user_order_list');
    }

    #[Route('/order/delete/{id}', methods: ['Get', 'DELETE'], name: 'delete_order')]
    public function delete($id): Response
    {
        $order = $this->orderRepository->find($id);
        $this->em->remove($order);
        $this->em->flush();

        return $this->redirectToRoute('user_order_list');
    }


}
