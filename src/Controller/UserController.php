<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Role;
use App\Form\RegistrationType;
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
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UserController extends Controller
{
    /**
     * @Route("/admin", name="user")
     */
    public function index()
    {
      
        $repo=$this->getDoctrine()->getRepository(User::class);
        $users=$repo->findAll();
  
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'users'=>$users
        ]);
    }
    /**
     * @Route("/home",name="userhome")
     */
    public function home(){
        return $this->render('user/home.html.twig');
    }
      /**
     * @Route("/login",name="connexion")
     */
    public function login(){
        return $this->render('user/login.html.twig');
    }
      /**
     * @Route("/deconnexion",name="logout")
     */
    public function logout(){
        return $this->render('user/login.html.twig');
    }
    /**
     * @Route("/inscription",name="user/inscription")
     *  @Route("/modifieuser/{id}",name="user/showuser")
     */
    public function registration(Request $request,UserPasswordEncoderInterface $encoder,SessionInterface $session, UserInterface $user){
        $user=new User();
        $manger = $this->getDoctrine()->getManager();
  
        if(!$user){
            $user=new User();
        }
             
$session1 = $this->session=$session;
$this->session->set('id', 'id');
$foo = $this->session->get('id');
     //  var_dump($session1);exit;

        $form=$this->createForm(RegistrationType::class,$user);
        $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $hash=$encoder->encodePassword($user,$user->getPassword());
      
        if(!$user->getId()){
            $user->setUserDatenaissance(new \DateTime());
        }
          $user->setPassword($hash);
      $user->setUserDatenaissance(new \DateTime());
    //  $user->setRoles(['ROLE_ADMIN']);
      $manger->persist($user);
      $manger->flush();
      return $this->redirectToRoute('connexion');
    }
        return $this->render('user/add.html.twig',['formuser'=>$form->createView(),'editMode'=>$user->getId()!==null]);
    }
  
    /**
     * @Route("/adduser",name="user/add")
     * @Route("/modifieuse/{id}",name="user/showuserd")
     */
    public function form(User $user =null,Request $request){
        $manger = $this->getDoctrine()->getManager();
       $role=new Role();
    
            
        if(!$user){
            $user=new User();
        }
        $form=$this->createFormBuilder($user)
        ->add('usernom', TextType::class, [
            'attr' => [
                'placeholder' => "Nom",
                'class'=>"form-control"
            ]
        ])
        ->add('userprenom', TextType::class, [
            'attr' => [
                'placeholder' => "Prénom",
                'class'=>"form-control"
            ]
        ])
        ->add('useremail', TextType::class, [
            'attr' => [
                'placeholder' => "Email",
                'class'=>"form-control"
            ]
        ])
        ->add('userpassword', TextType::class, [
            'attr' => [
                'placeholder' => "password",
                'class'=>"form-control"
            ]
        ])
        ->add('usercin', TextType::class, [
            'attr' => [
                'placeholder' => "CIN",
                'class'=>"form-control"
            ]
        ])
        ->add('usermatriculecnss', TextType::class, [
            'attr' => [
                'placeholder' => "Matricule CNSS",
                'class'=>"form-control"
            ]
        ])
        ->add('usersex', ChoiceType::class, [
            'choices'  => [
                'Etat' => null,
                'Femme' => 'Femme',
                'Homme' => "Homme",
            ],
            'attr' => [
                'placeholder' => "Sex",
                'class'=>"form-control"
            ]
        ])
        ->add('role', EntityType::class, [
            'class' => Role::class,
            'query_builder' => function (RoleRepository $er) {
                $qb = $er->createQueryBuilder($rolenom="rolenom",$id=null);
                return $qb->select('r')
                ->from(Role::class,'r');
                //->where('r.id = ?1');
               // ->orderBy('u.name', 'ASC');
             
            },
            'choice_label' => 'role_nom',
            ])
            
     //   ->add('Ajouter',SubmitType::class,['label'=>'Enregistrer'])
        ->getForm();
        $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        if(!$user->getId()){
            $user->setRoleDateCreation(new \DateTime());
        }
      $user->setRoleDateCreation(new \DateTime());
      $manger->persist($user);
      $manger->flush();
  return $this->redirectToRoute('user/showuser',['id'=>$user->getId()]);
    }
                return $this->render('user/add.html.twig',['formuser'=>$form->createView(),'editMode'=>$user->getId()!==null]);
    }
   
/**
     * @Route("/patient/{id}",name="show")
     */
    public function show($id){
        $repo=$this->getDoctrine()->getRepository(User::class);
        $users=$repo->find($id);
        return $this->render('user/show.html.twig',['users'=>$users]); 
    }
  /*  public function setDefaultOptions(OptionsResolverInterface $resolver){
       
$resolver->setDefaults(array('data_class'=>''));
       
    }*/

}
