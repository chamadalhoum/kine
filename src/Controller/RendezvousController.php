<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Toiba\FullCalendarBundle\Event\CalendarEvent;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Rendezvous;

class RendezvousController extends AbstractController
{
    /**
     * @Route("/rendezvous", name="rendezvous")
     */
    public function index()
    {
    $repo=$this->getDoctrine()->getRepository(Rendezvous::class);
    $produit=$repo->findAll();

    return $this->render('rendezvous/index.html.twig', [
        'controller_name' => 'RendezvousController',
        'produits'=>$produit
    ]);
}
    /**
     * @Route("/calendar", name="booking_calendar", methods={"GET"})
     */
    public function calendar(): Response
    {
    
        

    return $this->render('rendezvous/calendar.html.twig'
    );
    }
    
}
