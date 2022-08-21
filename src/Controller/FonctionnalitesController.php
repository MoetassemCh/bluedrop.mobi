<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FonctionnalitesController extends AbstractController
{
    #[Route('/fonctionnalites', name: 'app_fonctionnalites')]
    public function index(): Response
    {
        return $this->render('fonctionnalites/index.html.twig', [
            'controller_name' => 'FonctionnalitesController',
        ]);
    }
}
