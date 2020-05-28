<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ObjectManager;
//use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Role;
use App\Repository\RoleRepository;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class RoleController extends Controller
{
    /**
     * @Route("/role", name="role")
     * 
     */
     
    public function index(RoleRepository $repo)
    {
        //$repo=$this->getDoctrine()->getRepository(Role::class);
        $roles=$repo->findAll();
        return $this->render('role/index.html.twig', [
            'controller_name' => 'RoleController','roles'=>$roles
        ]);
    } /**
     * @Route("/addrole",name="role/add")
     * @Route("/modifierole/{id}",name="role/showrole")
     */
    public function form(Role $role =null,Request $request){
        $manger = $this->getDoctrine()->getManager();
      //  $role=new Role();
    
            
        if(!$role){
            $role=new Role();
        }
        $form=$this->createFormBuilder($role)
        ->add('rolenom', TextType::class, [
            'attr' => [
                'placeholder' => "Role",
                'class'=>"form-control"
            ]
        ])
        ->add('roleetat', ChoiceType::class, [
            'choices'  => [
                'Etat' => null,
                'Actif' => 'Actif',
                'Inactif' => "InActif",
            ],
            'attr' => [
                'placeholder' => "Role",
                'class'=>"form-control"
            ]
        ])
     //   ->add('Ajouter',SubmitType::class,['label'=>'Enregistrer'])
        ->getForm();
        $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        if(!$role->getId()){
            $role->setRoleDateCreation(new \DateTime());
        }
      $role->setRoleDateCreation(new \DateTime());
      $manger->persist($role);
      $manger->flush();
  return $this->redirectToRoute('role/showrole',['id'=>$role->getId()]);
    }
                return $this->render('role/add.html.twig',['formrole'=>$form->createView(),'editMode'=>$role->getId()!==null]);
    }
   
   
    
}
