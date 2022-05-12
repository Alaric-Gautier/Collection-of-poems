<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PoemController extends AbstractController
{
    #[Route('/poem/{slug}', name: 'poem_show')]
    public function show(): Response
    {
        return $this->render('poem/show.html.twig', [
            'controller_name' => 'PoemController',
        ]);
    }
}
