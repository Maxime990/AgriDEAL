<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/product_details')]
class ProductDetailsController extends AbstractController
{
    #[Route('/{id}', name: 'product_details')]
    
    public function ShowProductDetails(ManagerRegistry $doctrine,int $id): Response
    { 
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);
        return $this->render('product_details/index.html.twig', 
        [
            'product' => $product
          ]
        );
    }
}
