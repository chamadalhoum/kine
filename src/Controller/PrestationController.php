<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Prestation;
use App\Form\PrestationFormType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Request;


class PrestationController extends AbstractController
{
    /**
     * @Route("/prestation", name="prestation")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Prestation::class);
        $prestation=$repo->findAll();
  
        return $this->render('prestation/index.html.twig', [
            'controller_name' => 'PrestationController',
            'prestations'=>$prestation
        ]);
    }
    /**
     * @Route("/prest", name="prest")
     */
    public function prestation()
    {
        $repo=$this->getDoctrine()->getRepository(Prestation::class);
        $prestation=$repo->findAll();
  
        return $this->render('prestation/prestation.html.twig', [
            'controller_name' => 'PrestationController',
            'prestations'=>$prestation
        ]);
    }
     /**
     * @Route("/ajouterprestation",name="prestation/add")
     *  @Route("/prestationupdate/{id}",name="prestation/update")
     */
    public function registration(Prestation $prestation = null,Request $request){
       // $prestation=new Prestation();
    
        $manger = $this->getDoctrine()->getManager();
  
        if(!$prestation){
           $prestation=new Prestation();
        }
        $form=$this->createForm(PrestationFormType::class,$prestation);
        $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
       
      
        if(!$prestation->getId()){
            //$prestation->setUserDatenaissance(new \DateTime());
        }
        
      $manger->persist($prestation);
      $manger->flush();
      return $this->redirectToRoute('prestation/update',['id'=>$prestation->getId()]);
     
    }
        return $this->render('prestation/add.html.twig',['formprestation'=>$form->createView(),'editMode'=>$prestation->getId()!==null]);
    }
}
