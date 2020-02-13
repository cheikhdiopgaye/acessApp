<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 *  @Route("/api")
 */
class SecurityController extends AbstractController
{
    /**
      * @Route("/logincheck", name="login", methods={"POST","GET"})
      */
    public function login(Request $request)
    {
        $user = $this->getUser();

        return $this->json([
            'email' => $user->getUsername(),
            'roles' => $user->getRoles(),
        ]);
    }
}