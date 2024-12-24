<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\ProductCategory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class CreateUserController extends AbstractController
{
  #[Route('/create_user', name: 'create_user')]
  public function CreatUser(
    Request $request,
    EntityManagerInterface $entityManager,
    UserAuthenticatorInterface $userAuthenticator,
    UserPasswordHasherInterface $passwordHasher
  ): Response {
    $user = new Users();

    $user->setCreateAt(new \DateTime('now'));

    $user->setRoles($user->getRoles());

    $requestToSend = $this->createFormBuilder($user)
      ->add('nom', TextType::class, ['attr' => ['class' => 'form-control']])
      ->add('prenom', TextType::class, ['attr' => ['class' => 'form-control']])
      ->add('email', TextType::class, ['attr' => ['class' => 'form-control']])
      ->add('phone', TelType::class, ['attr' => ['class' => 'form-control']])
      ->add('pays', CountryType::class, ['attr' => ['class' => 'form-control']])
      ->add('ville', TextType::class, ['attr' => ['class' => 'form-control']])
      ->add('entreprise', ChoiceType::class,[
        'attr' => ['class' => 'form-control'],
        'choices' =>
        [ 'Sélectionnez le statut d\'activité' => '',
          'Production agricole' => 'Production agricole',
          'Import/Export' => 'Import/Export',
          'Industrie alimentaire' => 'Industrie alimentaire',
          'Vente au détail' => 'Vente au détail',
        ]
    ])
      ->add('favorisproduct',ChoiceType::class, [
        'attr' => ['class' => 'form-control'],
        'choices' =>
        [ 'Choisissez un produit de votre secteur' => 'Choisissez une catégorie',
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
      ->add('password', PasswordType::class, ['attr' => ['class' => 'form-control']])
      ->add('confirmPassword', PasswordType::class, ['attr' => ['class' => 'form-control']])
      ->add('userstatus', ChoiceType::class, [
        'attr' => ['class' => 'form-control'],
        'choices' =>
        [
          'Acheteur' => 'Acheteur',
          'Vendeur' => 'Vendeur',
          'Les deux' => 'Les deux'
        ]
      ])
      ->add('soumettre', SubmitType::class, ['attr' => ['class' => 'btn btn-primary']])
      ->getForm();

    $requestToSend->handleRequest($request);
    if ($requestToSend->isSubmitted() && $requestToSend->isValid()) {

      $hashPassword = $passwordHasher->hashPassword($user, $user->getPassword());
      $user->setPassword($hashPassword);

      $entityManager->persist($user);
      $entityManager->flush();
      
      return $this->redirectToRoute('main');   
 
    }
    return $this->render('create_user/index.html.twig', [
      'formulaireUser' => $requestToSend->createView(),
    ]);
  }
  /**
   * @Route("/connexion", name="app_login")
   *
   */
  public function login()
  {
    return $this->render('profil_user/index.html.twig');
  }

  /**
   * @Route("/deconnexion", name="app_logout")
   *
   * @return void
   */
  public function logout()
  {
  }
}
