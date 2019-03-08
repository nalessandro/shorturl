<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ShorturlService;

class ShortUrlController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('short_url/index.html.twig', [
            'controller_name' => 'ShortUrlController',
        ]);
    }

    /**
     * Shorten inserted URL
     *
     * @Route("/shorten", name="shorten")
     * 
     * @return string
     */
    public function shorten(Request $request, ShorturlService $shorten): Response
    {
        $result = $shorten->shorten($request->get('url'));
        
        return new Response($result);
    }
}
