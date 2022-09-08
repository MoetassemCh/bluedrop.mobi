<?php

namespace App\Controller;

use App\Repository\TicketRepository;
use App\Repository\NotesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


#[IsGranted('ROLE_USER')]

class NotesController extends AbstractController
{
    private $em;
    private $noteRepository;
    public function __construct(EntityManagerInterface $em, NotesRepository $noteRepository, TicketRepository $ticketRepository)
    {
        $this->em = $em;
        $this->noteRepository = $noteRepository;
        $this->ticketRepository = $ticketRepository;
    }
    #[Route('/user/notes', name: 'app_notes')]
    public function index(): Response
    {
        $notes = $this->noteRepository->findAll();
        $tickets = $this->ticketRepository->findAll();
        return $this->render('notes/index.html.twig', [
            'notes' => $notes,
            'tickets' => $tickets,
        ]);
    }
}
