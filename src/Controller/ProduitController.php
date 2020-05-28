<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Request;
class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Produit::class);
        $produit=$repo->findAll();
  
        return $this->render('Produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            'produits'=>$produit
        ]);
    }
     /**
     * @Route("/ajouterproduit",name="produit/add")
     *  @Route("/produitupdate/{id}",name="produit/update")
     */
    public function registration(Produit $produit = null,Request $request){
        // $prestation=new Prestation();
     
         $manger = $this->getDoctrine()->getManager();
   
         if(!$produit){
            $produit=new Produit();
         }
         $form=$this->createForm(ProduitType::class,$produit);
         $form->handleRequest($request);
     if($form->isSubmitted() && $form->isValid()){
        
       
         if(!$produit->getId()){
             //$prestation->setUserDatenaissance(new \DateTime());
         }
         
       $manger->persist($produit);
       $manger->flush();
       return $this->redirectToRoute('produit/update',['id'=>$produit->getId()]);
      
     }
         return $this->render('produit/add.html.twig',['formproduit'=>$form->createView(),'editMode'=>$produit->getId()!==null]);
     }
}
