<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
class LibraryController extends AbstractController


{
    private function select(array $data, string $letter){
        return  array_filter(
            array_flip($data),
            function ($var) use ($letter)
            {return substr($var, 0, 1) == $letter;
            });
}

    /**
     * @Route("/home/ecrivains/{limit}", name="home" , requirements={"limit"="[0-9]+"})
     * @Template("pages/home.html.twig)
     * @param Request $request
     * @param int $limit
     * @return array
     */
    public function index(Request $request, int $limit = 3)
    {
        $i = $_GET['initiale'];
        $i = $request->query->get('initiale');
        $cookies = $request->cookies;
        $headers = $request->headers->get('Content-Type');


        $content = [
            'Victor Hugo' => 'Notre-Dame de Paris',
            'Albert Camus' => 'L‘étranger',
            'Mme de Lafayette' => 'La Princesse de Clèves',
            'Denis Diderot' => 'Jacques le Fataliste',
            'Nathalie Sarraute' => 'Pour un oui ou pour un non',
            'Stendhal' => 'Le Rouge et le Noir'
        ];;
    $selection = $this->select($content, $i);
        return [
            'bookList' => array_splice($content, 0, $limit),
            'controller_name' => 'HomeController',
            'displayFooter' => true
        ];
    }

    public function about()
    {
    }

}


