<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MatrielController extends AbstractController
{
    /**
     * @Route("/matriel", name="matriel")
     */
    public function index()
    {
        return $this->render('matriel/index.html.twig', [
            'controller_name' => 'MatrielController',
        ]);
    }
}
