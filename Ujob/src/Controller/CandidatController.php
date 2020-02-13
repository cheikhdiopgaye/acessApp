<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CandidatType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 *  @Route("/api")
 */
class CandidatController extends AbstractController
{
    #####################------------------Début finalisation de l'inscription----------------#####################

    /**
     * @Route("/inscriptionC", name="inscriptionC", methods={"POST"})
     */
    public function inscriptionCandidat(Request $request,EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder, ValidatorInterface $validator){          

        $candidat=new User();
        $form = $this->createForm(CandidatType::class,$candidat);
        $data = json_decode($request->getContent(),true);
        if(!$data){//s il n'existe pas donc on recupere directement le tableau via la request
            $data=$request->request->all();
        }   
        $form->submit($data);
        if(!$form->isSubmitted() || !$form->isValid()){
            return $this->handleView($this->view($validator->validate($form)));
        }
        $roles=["ROLE_CANDIDAT"];
        $candidat->setRoles($roles);
        $candidat->setPhoto('academy-150x150.png');
        $candidat->setStatut('Connecter');
        // encode the plain password
        $candidat->setPassword(
            $encoder->encodePassword(
                $candidat,
                $form->get('plainPassword')->getData()
            )
        );
        $manager->persist($candidat);
        $manager->flush();
        return $this->handleView($this->view([$this->status=>'Enregistrer'],Response::HTTP_CREATED));
    }
    #####################-------------------Fin finalisation de l'inscription-----------------#####################

}
