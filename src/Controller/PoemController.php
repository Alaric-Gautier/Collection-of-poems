<?php

namespace App\Controller;

use App\Entity\Poem;
use App\Form\Type\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PoemController extends AbstractController
{
    #[Route('/poem/{slug}', name: 'poem_show')]
    public function show(?Poem $poem): Response
    {
        if (!$poem) {
            return $this->redirectToRoute('app_home');
        }

        $commentForm = $this->createForm(CommentType::class);

        return $this->renderForm('poem/show.html.twig', [
            'poem' => $poem,
            'commentForm' => $commentForm
        ]);
    }
}
