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
    public function shorten(Request $request, ShorturlService $svc): Response
    {
        $result = $svc->shorten($request->get('url'));
        
        return new Response($result);
    }

    /**
     * Lenthen and redirect to URL
     * 
     * @Route("/{url}", name="lengthen")
     */
    public function lengthen($url, ShorturlService $svc)
    {
        if (strlen($url) > 8) {
            print_r('LEN > 8');die;
            return $this->redirectToRoute('home');
        }
            
        
        $result = $svc->lengthen($url);
        if(strpos($result, 'http://') !== false)
            return $this->redirect($result);
        
        return $this->redirect('http://'.$result);
    }
}
