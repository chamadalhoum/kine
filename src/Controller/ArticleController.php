<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Article::class);
        $article=$repo->findAll();
  
        return $this->render('Article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles'=>$article
        ]);
    }
     /**
     * @Route("/ajouterarticle",name="article/add")
     *  @Route("/articleupdate/{id}",name="article/update")
     */
    public function registration(Article $article = null,Request $request){
        // $prestation=new Prestation();
     
         $manger = $this->getDoctrine()->getManager();
   
         if(!$article){
            $article=new Article();
         }
         $form=$this->createForm(ArticleType::class,$article);
         $form->handleRequest($request);
     if($form->isSubmitted() && $form->isValid()){
        
       
         if(!$article->getId()){
             //$prestation->setUserDatenaissance(new \DateTime());
         }
         
       $manger->persist($article);
       $manger->flush();
       return $this->redirectToRoute('article/update',['id'=>$article->getId()]);
      
     }
         return $this->render('article/add.html.twig',['formarticle'=>$form->createView(),'editMode'=>$article->getId()!==null]);
     }
}
