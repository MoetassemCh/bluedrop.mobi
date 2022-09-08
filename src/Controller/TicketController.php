<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\TicketType;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


#[IsGranted('ROLE_USER')]
class TicketController extends AbstractController
{
    private $em;
    private $ticketRepository;
    public function __construct(EntityManagerInterface $em, TicketRepository $ticketRepository)
    {
        $this->em = $em;
        $this->ticketRepository = $ticketRepository;
    }
    #[Route('/user/tickets', name: 'app_tickets')]
    public function index(): Response
    {
        $tickets = $this->ticketRepository->findAll();
        return $this->render('ticket/index.html.twig', [
            'tickets' => $tickets

        ]);
    }


    #[Route('/tickets/create', name: 'create_ticket')]
    public function create(Request $request): Response
    {
        $ticket = new Ticket();
        $form = $this->createForm(TicketType::class, $ticket);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newTicket = $form->getData();
            $newTicket->setUser($this->getUser());
            $this->em->persist($newTicket);
            $this->em->flush();
            return $this->redirectToRoute('app_tickets');
        }
        return $this->render('ticket/create.html.twig', [
            'ticket_form' => $form->createView()
        ]);
    }
}
