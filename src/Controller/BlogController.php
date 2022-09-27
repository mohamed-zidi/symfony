<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use App\Controller\ObjectManager;
// use Doctrine\Common\Persistence\ObjectManager;


class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(ArticlesRepository $articlesRepository): Response
    {
        
        $articles = $articlesRepository->findAll();

        return $this->render('blog/index.html.twig', [
            'articles' => $articles
        ]);

        

    }

    #[Route('/blog/{slug}', name: 'app_article')]
    public function article($slug, ArticlesRepository $articlesRepository): Response
    {
        
        $article = $articlesRepository->find($slug);

        return $this->render('blog/article.html.twig', [
            'article' => $article
        ]);
    }

    #[Route('/blog/new', name: 'app_new')]
    public function creer(Request $request): Response
    {
        $new = "Ecrire un article";

        $article = new Articles();
        $form = $this->createFormBuilder($article)
                     ->add('title',TextType::class,[
                        'attr' => [
                            'class' => 'form-control'

                        ]
                     ])
                     ->add('content',TextareaType::class,[
                        'attr' => [
                            'class' => 'form-control'
                        ]
                     ])
                     ->add('save',SubmitType::class,[
                        'attr' => [
                            'class' => 'btn btn-primary mt-3',
                            'label' => 'Ajouter l\'article'

                        ]
                     ])
                     ->getform();

        dump($article);
        $form->handleRequest($request);

        return $this->render('blog/new.html.twig', [
            'new' => $new,
            'formArticle' => $form->createView()
        ]);
    }

}
