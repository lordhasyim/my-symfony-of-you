<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     * @return Response
     */
    public function homepage()
    {
        return new Response('this is my first response');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        //return new Response(sprintf("Future page %s", $slug));
        return $this->render('article/show.html.twig',[
            'title' =>  ucwords(str_replace('-', ' ', $slug))
        ]);
    }
    

}