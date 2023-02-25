<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JokeMembreController extends AbstractController
{
    #[IsGranted('ROLE_MEMBRE')]
    #[Route('/joke/membre', name: 'app_joke_membre')]
    public function index(): Response
    {
        return $this->render('joke_membre/index.html.twig', [
            'controller_name' => 'JokeMembreController',
        ]);
    }
}
