<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogEditorController extends AbstractController
{
    #[Route('/blog_editor', name: 'blog_editor')]
    public function index(): Response
    {
        return $this->render('blog_editor/index.html.twig', [
            'controller_name' => 'BlogEditorController',
        ]);
    }
}
