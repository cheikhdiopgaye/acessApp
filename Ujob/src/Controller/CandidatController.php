<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CandidatType;
use App\Form\UpdatecandidatType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 *  @Route("/api")
 */
class CandidatController extends FOSRestController
{
    private $connecter;
    private $deconnecter;
    public function __construct()
    {
        $this->connecter="Connecter";
        $this->deconnecter="Deconnecter";
    }
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
    
     /**
     * @Route("/candidat/update/{id}", name="update_candidat", methods={"POST"})
     */
    public function updateCandidat(User $candidat,Request $request, EntityManagerInterface $manager, ValidatorInterface $validator,UserPasswordEncoderInterface $encoder){
            
        if(!$candidat){
            throw new HttpException(404,'Cet utilisateur n\'existe pas !');
        }

        $ancienPassword=$candidat->getPassword();
        $ancienConfirmepassword=$candidat->getConfirmepassword();
        $form = $this->createForm(UpdatecandidatType::class,$candidat);
        $data=json_decode($request->getContent(),true);//si json
        if(!$data){
            $data=$request->request->all();//si non json
        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        $form->submit($data);
        if(!$form->isSubmitted()){
            return $this->handleView($this->view($validator->validate($form)));
        }

        if(!$candidat->getPhoto()){//s il ne change pas sa photo
            $candidat->setPhoto($candidat->getPhoto());
        }
       
       /*  
        if($requestFile=$request->files->all()){
            $file=$requestFile['image'];
                
            if($file->guessExtension()!='png' && $file->guessExtension()!='jpeg'){
                throw new HttpException(400,'Entrer une image valide !! ');
            }

            $fileName=md5(uniqid()).'.'.$file->guessExtension();//on change le nom du fichier
            $candidat->setImage($fileName);
            $file->move($this->getParameter($this->imageAng),$fileName); //definir le image_directory dans service.yaml
            $ancienImage=$this->getParameter($this->imageAng)."/".$ancienImage;
            if($ancienImage){
                unlink($ancienImage);//supprime l'ancienne 
            }
                
        } */

        $candidat->setPassword($ancienPassword);
        $candidat->setStatut($candidat->getStatut());
        $candidat->setConfirmepassword($ancienConfirmepassword);


        $manager->persist($candidat); 
        $manager->flush();
        $afficher = [
            $this->status => 200,
            $this->message => 'L\'utilisateur a été correctement modifié !'
        ];
        return $this->handleView($this->view($afficher,Response::HTTP_OK));
            
    }
    
    /**
    * @Route("/candidat/bloquer/{id}", name="bloquer_debloquer_candidat", methods={"GET"})
    */ 
    public function bloquerCandidat(EntityManagerInterface $manager,User $candidat=null)
    {
        if($candidat->getStatut() == $this->connecter){
            $candidat->setStatut($this->deconnecter);
            $texte= 'Candidat déconnecter';
        }
        else  if($candidat->getStatut() == $this->deconnecter)
        {
            $candidat->setStatut($this->connecter);
            $texte='Candidat connecter';
        }
        $manager->persist($candidat);
        $manager->flush();
        $afficher = [ $this->status => 200, $this->message => $texte];
        return $this->handleView($this->view($afficher,Response::HTTP_OK));
    }
}
