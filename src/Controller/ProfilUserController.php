<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilUserController extends AbstractController
{
    #[Route('/profiluser', name: 'profil_user')]
    public function index(): Response
    {
        return $this->render('profiluser/index.html.twig', [
            'controller_name' => 'ProfilUserController',
        ]);
    }
}
