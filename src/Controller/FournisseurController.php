<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Request;


class FournisseurController extends AbstractController
{
    /**
     * @Route("/fournisseur", name="fournisseur")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Fournisseur::class);
        $fournisseur=$repo->findAll();
  
        return $this->render('fournisseur/index.html.twig', [
            'controller_name' => 'FournisseurController',
            'fournisseurs'=>$fournisseur
        ]);
    }
    /**
     * @Route("/fourni", name="fourni")
     */
    public function fournisseur()
    {
        $repo=$this->getDoctrine()->getRepository(Fournisseur::class);
        $fournisseur=$repo->findAll();
  
        return $this->render('fournisseur/fournisseur.html.twig', [
            'controller_name' => 'FournisseurController',
            'fournisseurs'=>$fournisseur
        ]);
    }
     /**
     * @Route("/ajouterfournisseur",name="fournisseur/add")
     *  @Route("/fournisseurupdate/{id}",name="fournisseur/update")
     */
    public function registration(Fournisseur $fournisseur = null,Request $request){
       // $prestation=new Prestation();
    
        $manger = $this->getDoctrine()->getManager();
  
        if(!$fournisseur){
           $fournisseur=new Fournisseur();
        }
        $form=$this->createForm(FournisseurType::class,$fournisseur);
        $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
       
      
        if(!$fournisseur->getId()){
            //$prestation->setUserDatenaissance(new \DateTime());
        }
        
      $manger->persist($fournisseur);
      $manger->flush();
      return $this->redirectToRoute('fournisseur/update',['id'=>$fournisseur->getId()]);
     
    }
        return $this->render('fournisseur/add.html.twig',['formfournisseur'=>$form->createView(),'editMode'=>$fournisseur->getId()!==null]);
    }
}
