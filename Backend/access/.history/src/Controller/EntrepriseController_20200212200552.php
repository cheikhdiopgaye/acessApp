<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class EntrepriseController extends AbstractController
{
    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function index()
    {
        return $this->render('entreprise/index.html.twig', [
            'controller_name' => 'EntrepriseController',
        ]);
    }
    
/**
* @Route("/register", name="app_register", methods={"POST"})
*/
public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
{
    $entreprise = new Entreprise();
    $form = $this->createForm(EntrepriseType::class, $entreprise);
    $form->handleRequest($request);
    $data=$request->request->all();
    $form->submit($data);

   
        // encode the plain password
        $entreprise->setPassword(
            $passwordEncoder->encodePassword(
                $entreprise,
                $form->get('password')->getData()
            )
        );

        $entreprise->setStatutentreprise(["active"]);
        $entreprise->setRoles(["Role_Annonceur"]);
       

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($entreprise);
        $entityManager->flush();

        // do anything else you need here, like send an email

        
        return new Response('Entreprise bien ajoutée',Response::HTTP_CREATED); 

}
}
