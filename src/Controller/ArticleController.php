<?php


namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @return Response
     */
    public function homepage()
    {
        //return new Response('this is my first response');
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    //public function show($slug)
    public function show($slug, Environment $twigEnvironment) // call twig manually
    {
        $comments = [
            'Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s standard dummy text ever since the 1500s',
            'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. isn\'t?',
            ' arema sam'
        ];
        //return new Response(sprintf("Future page %s", $slug));
//        return $this->render('article/show.html.twig',[
//            'title' =>  ucwords(str_replace('-', ' ', $slug)),
//            'slug' => $slug,
//            'comments' => $comments
//        ]);

        $html = $twigEnvironment->render('article/show.html.twig',[
             'title' =>  ucwords(str_replace('-', ' ', $slug)),
             'slug' => $slug,
             'comments' => $comments
         ]);

        return new Response($html);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        //$this->json is equal to new JsonResponse();

        $logger->info("article being harted");

        return $this->json(['hearts' => rand(5, 100)]);
    }



}