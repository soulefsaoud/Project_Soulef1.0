<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JournalController extends AbstractController
{
    #[Route('/journal', name: 'journal')]
    public function index(): Response
    {
        return $this->render('journal/index.html.twig', [
            'controller_name' => 'JournalController',
        ]);
    }
}
