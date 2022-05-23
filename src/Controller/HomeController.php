<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\PoemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PoemRepository $poemRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'poems' => $poemRepository->findAll(),
            'categories' => $categoryRepository->findAll()
        ]);
    }
}
