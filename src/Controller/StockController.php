<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use App\Form\ProduitType;
use App\Entity\Article;
use App\Form\ArticleType;
class StockController extends AbstractController
{
    /**
     * @Route("/stock", name="stock")
     */
    public function index()
    {

        $repo=$this->getDoctrine()->getRepository(Produit::class);
        $produit=$repo->findAll();
        $repo=$this->getDoctrine()->getRepository(Article::class);
        $article=$repo->findAll();
        return $this->render('stock/index.html.twig', [
            'controller_name' => 'StockController',
            'produits'=>$produit,'articles'=>$article

        ]);
    }
}
