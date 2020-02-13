<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceurController extends AbstractController
{
    /**
     * @Route("/annonceur", name="annonceur")
     */
    public function index()
    {
        return $this->render('annonceur/index.html.twig', [
            'controller_name' => 'AnnonceurController',
        ]);
    }
}
