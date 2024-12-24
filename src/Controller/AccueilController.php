<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    #[Route('/', name: 'accueil')]
    public function accueil(Security $security): Response
    {
        $user = $this->security->getUser();
        
        return $this->render('accueil/index.html.twig', [
            'user' => $user,
        ]);
    }
}
