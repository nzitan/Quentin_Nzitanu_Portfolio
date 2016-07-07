<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Projets;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $quest)
    {
        $projets = $this->getDoctrine()->getRepository('AppBundle:Projets')->findAll();
        return $this->render('index.html.twig', [
            'titre' => 'Quentin Nzitanu', 'projets' => $projets,
        ]);
    }

    /**
     * @Route("/admin", name="administration")
     *  @Method({"GET", "POST"})
     */

    public function adminAction(Request $quest){
        $session = new Session();
        $request = Request::createFromGlobals();
        $connexionData =  array('username' => 'Ecris ton nom');
        $form = $this->createFormBuilder($connexionData)
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->add('connect', SubmitType::class, array('label'=>'Connexion'))
            ->getForm();
        if($request->getMethod() === "GET"){
            return $this->render('form.html.twig', [
                'titre' => 'Administration', 'form' => $form->createView(),
            ]);
        } else {
            $form->handleRequest($quest);
            if($form->isSubmitted() && $form->isValid()){
                $data = $form->getData();
                if($data['username'] === "Akared" && $data['password'] === "Akared555"){
                    $session->set('admin', "AkaredGear");
                    header('Refresh: 0; url=/projet');
                }
                return $this->render('form.html.twig', [
                    'titre' => 'Administration', 'form' => $form->createView(),
                ]);
            }
        }
    }

    /**
     * @Route("/projet", name="projet")
     *  @Method({"GET", "POST"})
     */

    public function addProjetAction(Request $quest){
        $session = new Session();
        $request = Request::createFromGlobals();
        $admin = $session->get('admin');
        if($admin === "AkaredGear"){
            $projet = new Projets();
            $form = $this->createFormBuilder($projet)
                ->add('Nom', TextType::class, array('label'=>'Nom du Projet'))
                ->add('Path', TextType::class, array('label'=>'Chemin du Projet'))
                ->add('Description', TextareaType::class, array('label'=>'Description du Projet'))
                ->add('Image', TextType::class, array('label' => 'Image'))
                ->add('save', SubmitType::class, array('label'=> 'Ajouter'))
                ->getForm();
            if($request->getMethod() === "GET"){
                return $this->render('form.html.twig', [
                    'titre' => 'Administration', 'form' => $form->createView(),
                ]);
            } else {
                $form->handleRequest($quest);
                if($form->isSubmitted() && $form->isValid()){
                    $manager = $this->getDoctrine()->getManager();
                    $manager->persist($projet);
                    $manager->flush();
                }
                return $this->render('form.html.twig', [
                    'titre' => 'Administration', 'form' => $form->createView(),
                ]);
            }
        } else {
            header('Refresh: 0; url=/');
        }
    }
}
