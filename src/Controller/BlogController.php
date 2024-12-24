<?php
    namespace App\Controller;

    use App\Entity\Article;
    use App\Entity\Blog;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\String\Slugger\SluggerInterface;
    use FOS\CKEditorBundle\Form\Type\CKEditorType;
    use App\Form\BlogFormType;
    use App\Controller\Urlizer;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Validator\Constraints\DateTime;
    use Symfony\Component\HttpFoundation\File\Exception\FileException;


    class BlogController extends AbstractController
    {
        #[Route('/blog', name: 'blog_name')]
        public function index(Request $request,
         EntityManagerInterface $entityManager): Response
       
        {
        $blog = new Blog();
        
        $form= $this->createForm(BlogFormType::class,$blog);
        
        $form -> handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())

        {
        $blog -> setCreateAt(new \DateTime('now'));
        $blog -> setUpdateAt(new \DateTime('now'));

        $file = $form ->get('picturecover')->getData();

        /**
         * @var UploadedFile $file
         */

        $filename = md5(uniqid()).'.'.$file ->guessExtension();    

        $file ->move($this->getParameter('upload_directory'),$filename);
        
        $blog -> setPicturecover($filename);

        $entityManager->persist($blog);

        $entityManager->flush();

        return new Response('Votre article '.$blog->getId().' a été pulié avec succès ');

          }
         return $this->renderForm('blog/index.html.twig',[
       'formulaire' => $form
      ]);
    }
 }
