<?php

namespace App\Controller;

 use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'shop_name', methods: ['GET'])]
    public function RetrieveProductData(ManagerRegistry $managerRegistry): Response
    {
        $product = $managerRegistry->getRepository(Product::class)->findAll();
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }
        return $this->render('shop/index.html.twig', [
            'product' => $product,
        ]);
    }
}
