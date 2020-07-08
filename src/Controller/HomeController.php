<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/home.html.twig', [
            //'controller_name' => 'HomeController',
        ]);
    }


    /**
     * @Route("/home/index/{limit}" , name="index")
     * @param int $limit
     * @return Response
     */
    public function home(int $limit)
    {
        $content = [
            'image' => 'https://via.placeholder.com/150',
            'title' => 'Un super Article',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam beatae cum eligendi est eum illo illum ipsam minus mollitia perferendis vitae, voluptatum? Consequatur dolores esse omnis provident, tenetur vero vitae! A aliquid aperiam dicta eligendi ipsa nisi nostrum odit ratione reprehenderit unde? Dicta ex ipsam nam pariatur, quo quos sed? Accusantium enim eveniet exercitationem ipsa perferendis quasi sequi. Architecto, distinctio!',
         ];
        return $this->render('home/index.html.twig', [
            'article' => array_splice($content,0, 3,$limit)
            ]
        );
    }
}
