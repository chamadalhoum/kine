<?php

namespace App\Controller;

use App\Entity\Dossiermedicale;
use App\Entity\Photos;
use App\Form\DossiermedicaleType;
use App\Repository\DossiermedicaleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dossiermedicale")
 */
class DossiermedicaleController extends AbstractController
{
    /**
     * @Route("/", name="dossiermedicale_index", methods={"GET"})
     */
    public function index(DossiermedicaleRepository $dossiermedicaleRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_Patient');
        return $this->render('dossiermedicale/index.html.twig', [
            'dossiermedicales' => $dossiermedicaleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dossiermedicale_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        
        $dossiermedicale = new Dossiermedicale();
        $form = $this->createForm(DossiermedicaleType::class, $dossiermedicale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //on génére un nouveau nom de fichier
       // $images =$dossiermedicale->getPhotos();
         $images = $form->get('photos')->getData();
         foreach($images as $image){
                //on copie le fichier dans le dossier uploads
                $fichier=md5(uniqid()).'.'.$image->guessExtension();
                // on copie le ficher dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
                $img = new Photos();
                $img->setName($fichier);
                $dossiermedicale->addImage($img);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dossiermedicale);
            $entityManager->flush();

            return $this->redirectToRoute('dossiermedicale_index');
        }

        return $this->render('dossiermedicale/new.html.twig', [
            'dossiermedicale' => $dossiermedicale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossiermedicale_show", methods={"GET"})
     */
    public function show(Dossiermedicale $dossiermedicale): Response
    {
        return $this->render('dossiermedicale/show.html.twig', [
            'dossiermedicale' => $dossiermedicale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dossiermedicale_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dossiermedicale $dossiermedicale): Response
    {
        $form = $this->createForm(DossiermedicaleType::class, $dossiermedicale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dossiermedicale_index');
        }

        return $this->render('dossiermedicale/edit.html.twig', [
            'dossiermedicale' => $dossiermedicale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossiermedicale_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Dossiermedicale $dossiermedicale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dossiermedicale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dossiermedicale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dossiermedicale_index');
    }
}
