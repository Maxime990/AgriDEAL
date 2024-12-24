<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Entity\Product;
use App\Entity\ShoppBuyer;
use App\Entity\SearchEntity;
use App\Entity\ProductCategory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $manager) {
        $this->manager = $manager;
    }
    #[Route('/project', name: 'project')]
    public function recupereInfo(Request $request): Response
    {
        $ville = $this->manager->getRepository(Ville::class)->findAll();
        $categorie = $this->manager->getRepository(ProductCategory::class)->findAll();
        $product = $this->manager->getRepository(Product::class)->findAll();
        $shop = $this->manager->getRepository(ShoppBuyer::class)->findAll();
        $search = new SearchEntity();
         
        $form = $this->createFormBuilder($search)
            ->add('locationUser', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control','placeholder' => 'Saisissez votre localisation'],
            ])

            ->add('city', ChoiceType::class, [
                 'attr' => ['class' => 'form-control'],
                'choices' =>
                [
                  'Choisissez une ville' => 'Choisissez une ville',
                  'N\'djamena' => 'N\'djamena',
                  'Moundou' => 'Moundou',
                  'Abéché' => 'Abéché',
                  'Doba' => 'Doba',
                  'Sarh' => 'Sarh',
                  'Bongor' => 'Bongor',
                  'Pala' => 'Pala',
                  'Bébalem' => 'Bébalem',
                  'Bénoye' => 'Bénoye',
                  'Déli' => 'Déli',
                  'Kelo' => 'Kelo',
                ],
                'label' => '<i class="fi fi-rr-city"></i> Choisissez une ville',
            ])
            ->add('categorie',ChoiceType::class, [
                'attr' => ['class' => 'form-control'],
                'choices' =>
                [ 'Choisissez une catégorie' => 'Choisissez une catégorie',
                  'Riz' => 'Riz',
                  'Charcuterie' => 'Charcuterie',
                  'Viande' => 'Viande',
                  'Fruit' => 'Fruit',
                  'Legume' => 'Legume',
                  'Poisson' => 'Poisson',
                  'Epicerie' => 'Epicerie',
                  'Césame' => 'Césame',
                  'Maïs' => 'Maïs',
                  'Haricot' => 'Haricot',
                  'Pomme de terre' => 'Pomme de terre',
                  'Maïs à semence' => 'Maïs à semence',
                  'Coton' => 'Coton',
                  'Coton graine' => 'Coton graine',
                  'Noix de Cajou'=>'Noix de Cajou',
                  'Autre' => 'Autre',
                ]
            ])
            ->add('minPrice',IntegerType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control','placeholder' => 'Prix minimum','min' => '0'],
            ])
            ->add('maxPrice',IntegerType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control','placeholder' => 'Prix maximum','min' => '0'],
            ])
            ->add('submit',SubmitType::class, [
                'label' => 'Recherche',
                'attr' => ['class' => 'btn btn-primary'],
            ])
            ->getForm();

           $form->handleRequest($request);
           if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData();
           }

        return $this->render('project/index.html.twig', [
             'ville' => $ville,
             'categorie' => $categorie,
             'product' => $product,
             'shop' => $shop,
             'form' => $form->createView(),
        ]);
    }

    #[Route('/shop', name: 'search', methods: ['GET', 'POST'])]
    public function recupereShoppBuyer(Request $request): Response
     {
            return $this->render('shop/index.html.twig', [
           'shop' => ''
        ]);
    }
  }
