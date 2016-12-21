<?php

namespace Rokka\ValidFormsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Rokka\ValidFormsBundle\Entity\User;
use Rokka\ValidFormsBundle\Entity\Post;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Rokka\ValidFormsBundle\Form\NewPost;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RokkaValidFormsBundle:Default:index.html.twig');
    }

    public function userAction(Request $request)
    {
        $user = new User();

        $user->setLogin("Login");
        $user->setFirstname("FirstName");
        $user->setLastname("Lastname");
        $user->setPassword("Password");
        $user->setMail("my@mail.com");
        $user->setAdress("Cherkassy");
        $user->setBorthday(new \DateTime("11.11.1988"));
        $user->setAge(15);
        $user->setGender("male");


        $form = $this->createFormBuilder($user)
            ->add('Login', TextType::class)
            ->add('Password', PasswordType::class)
            ->add('Firstname', TextType::class)
            ->add('Lastname', TextType::class)
            ->add('Mail', EmailType::class)
            ->add('Gender', ChoiceType::class, array(
                'choices'  => array(
                    'Male' => "male",
                    'Female' => "female",
                )
            ))
            ->add('Age', IntegerType::class)
            ->add('Borthday', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create User'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('task_success');
        }


        return $this->render('RokkaValidFormsBundle:User:new.html.twig', array(
            'form' => $form->createView(),
        ));


    }

    public function postAction(Request $request)
    {

        $post = new Post();
        $post->setUser("Admin");
        $post->setDate(new \DateTime('now'));
        $form = $this->createForm(NewPost::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $post = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('task_success');
        }


        return $this->render('RokkaValidFormsBundle:post:new.html.twig', array(
            'form' => $form->createView(),
        ));



    }

    public function successAction()
    {
        return $this->render('RokkaValidFormsBundle:Default:success.html.twig');
    }
}
