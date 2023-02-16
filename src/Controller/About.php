<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class About extends AbstractController
{
    /**
     * @Route("about")
     */
    public function number(): Response
    {
        $number = random_int(0, 100);
        $name   = "samiha";

        return $this->render('about.html.twig', [
            'number' => $number,
            'name'   => $name
        ]);
    }
}