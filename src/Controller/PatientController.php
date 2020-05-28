<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Role;
use App\Form\RegistrationType;
use App\Entity\Prestation;
use App\Form\PrestationFormType;
//use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class PatientController extends Controller
{
    /**
     * @Route("/patient", name="patient")
     */

    public function index(Request $request){
        $this->denyAccessUnlessGranted('ROLE_Patient');
      //  UserPasswordEncoderInterface $encoder;
        $user=new User();
        $manger = $this->getDoctrine()->getManager();
        $repo=$this->getDoctrine()->getRepository(Prestation::class);
        $prestation=$repo->findAll();
  
        if(!$user){
            $user=new User();
        }
        $form=$this->createForm(RegistrationType::class,$user);
        $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $hash=$encoder->encodePassword($user,$user->getPassword());
      
        if(!$user->getId()){
            $user->setUserDatenaissance(new \DateTime());
        }
          $user->setPassword($hash);
      $user->setUserDatenaissance(new \DateTime());
      $user->setRoles(['ROLE_ADMIN']);
      $manger->persist($user);
      $manger->flush();
      return $this->redirectToRoute('connexion');
    }
        return $this->render('patient/index.html.twig',['formuser'=>$form->createView(),'editMode'=>$user->getId()!==null,'prestations'=>$prestation]);
    }
  
}
