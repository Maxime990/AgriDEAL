<?php

namespace App\Controller;

use DateTime;
use App\Entity\Ville;
use App\Entity\Product;
use App\Form\ProductType;
use App\Entity\ShoppBuyer;
use App\Service\ServiceInput;
use App\Entity\ProductCategory;
use App\Repository\VilleRepository;
use App\Repository\ShoppBuyerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

    private $manager;
    private $security;
    public function __construct(EntityManagerInterface $manager,Security $security)
    {
       $this->manager = $manager; 
       $this->security = $security;
    }
    #[Route('/admin', name: 'admin')]
    public function addProduct(Request $request): Response
    {
        $product = new Product();
        $categorie = $this->manager->getRepository(ProductCategory::class)->findAll();
        $ville = $this->manager->getRepository(Ville::class)->findAll();

        $product->setCreateAt(new DateTime('now'));
        $form = $this->createForm(ProductType::class,$product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->manager->persist($product);
            $this->manager->flush();

            $this->addFlash('product','Produit ajouté avec succès');
            return $this->redirectToRoute('admin');
        }
        return $this->render('admin/index.html.twig', [
            'categorie' => $categorie,
            'shopville' => $ville,
            'form' => $form->createView()
        ]);
      }

      /**
       * Ajouter une nouvelle catégorie
       */
        #[Route('/admin/addcategory', name: 'add_category')]
        public function addCategory(Request $request): Response
        {
            $category = new ProductCategory();
            $content = $request->request->get('categorie');

            if($request->isMethod('POST') && !empty($content))
            {
                $category->setTitre($content);

                $this->manager->persist($category);
                $this->manager->flush();

                $this->addFlash('category','Catégorie ajoutée avec succès');
                return $this->redirectToRoute('admin');
            }
            return $this->render('admin/categorie.html.twig');
        }

        /**
         * Ajouter un nouveau magasin
         */
        #[Route('/admin/path', name: 'add_shop')]
        public function addShop(Request $request,ServiceInput $service): Response
        {
            $name = $request->request->get('shopname');
            $phone = $request->request->get('shopphone');
            $address = $request->request->get('shopadresse');
            $typeProduct = $request->request->get('shoptype');   
            $ville = $request->request->get('shopcity');

            if($request->isMethod('POST') && !empty($name) && !empty($phone) && !empty($address) && !empty($typeProduct) && !empty($ville))
            {
                $shop = new ShoppBuyer();               
                $shop->setCity($ville);
                $shop->setName($name);
                $shop->setPhone($phone);
                $shop->setAddress($address);
                $shop->setProdcutType($typeProduct);
                $shop->setCreateDate(new DateTime('now'));

                $this->manager->persist($shop);
                $this->manager->flush();

                $this->addFlash('shop','Magasin ajouté avec succès');
                return $this->redirectToRoute('admin');
            }else
            {
                $this->addFlash('shop','Veuillez remplir tous les champs');
            }
            return $this->render('admin/magasin.html.twig');
        }

        /*
        /**
         * Ajouter une nouvelle ville
         */
        #[Route('/admin/addcity', name: 'add_city')]
        public function addCity(Request $request): Response
        {
            $city = new Ville();
            $cityname = $request->request->get('cityname');

            if($request->isMethod('POST') && !empty($cityname))
            
            {
                $city->setNom($cityname);

                $this->manager->persist($city);
                $this->manager->flush();

                $this->addFlash('city','Ville ajoutée avec succès');
                return $this->redirectToRoute('admin');
            }
            return $this->render('admin/ville.html.twig');
        }
     
    }
