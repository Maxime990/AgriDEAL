<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SucessController extends AbstractController
{
    #[Route('/sucess', name: 'sucess')]
    public function index(): Response
    {
        return $this->render('sucess/index.html.twig', [
            'controller_name' => 'SucessController',
        ]);
    }
}
