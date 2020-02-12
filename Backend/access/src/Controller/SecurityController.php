<?php

namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/api")
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
            'username' => $user->getUsername(),
            'roles' => $user->getRoles(),
        ]);
    }
}
