<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Service\CallApiService;


class JokePremiumController extends AbstractController
{
    #[IsGranted('ROLE_PREMIUM')]
    #[Route('/joke/premium', name: 'app_joke_premium')]
    public function index(CallApiService $callApiService): Response
    {
        // // $joke = new SymfonyDocs;
        // $joke->fetchRandomJokes();
        // dd($joke);
        $result = $callApiService->fetchRandomJokes();

        return $this->render('joke_premium/index.html.twig', [
            'controller_name' => 'JokePremiumController',
        ]);
    }
}




// $result = $this->fetchRandomJokes();