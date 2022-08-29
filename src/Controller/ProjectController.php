<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ProjectController extends AbstractController
{
    private $projectRepository;
    private $em;

    public function __construct(ProjectRepository $projectRepository, EntityManagerInterface $em)
    {
        $this->projectRepository = $projectRepository;
        $this->em = $em;
    }
    #[Route('/project',methods:['GET'] ,name: 'app_project')]
    public function index(): Response
    {
        $projects=$this->projectRepository->findAll();
        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);
    }
}
