<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AnnonceurController extends AbstractController
{

/**
* @Route("/inscriptionannonceur", name="inscriptionannonceu", methods={"POST"})
*/
public function adduser(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder): Response
{
    
                $entreprise= new Entreprise();
                $form = $this->createForm(EntrepriseType::class, $entreprise);
                $data=$request->request->all();
                $form->submit($data);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($entreprise);
                $entityManager->flush();

    $utilisateur = new User();
    $form=$this->createForm(UserType::class , $utilisateur);
    $form->handleRequest($request);
    $data=$request->request->all();
    $form->submit($data);

    $utilisateur->setRoles(["ROLE_ANNONCEUR"]);
    $utilisateur->setStatut("actif");
    $utilisateur->setPassword($passwordEncoder->encodePassword($utilisateur,
    $form->get('password')->getData()
        )
        );
    $entityManager = $this->getDoctrine()->getManager();
     $utilisateur->setEntreprise($entreprise);
    $entityManager->persist($utilisateur);
    $entityManager->flush();
    return new Response('Un utitilisateur est bien ajouté',Response::HTTP_CREATED); 
}
}
