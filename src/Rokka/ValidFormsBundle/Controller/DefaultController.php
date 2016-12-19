<?php

namespace Rokka\ValidFormsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
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
        $user->setMail("my@mail.om");
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


       /* $validator = $this->get('validator');
        $errors = $validator->validate($user);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return $this->render('user/validation.html.twig', array(
                'errors' => $errorsString,
            ));
        }

        return new Response('The user is valid! Yes!');*/
    }

    public function postAction()
    {

        $post = new Post();

        $validator = $this->get('validator');
        $errors = $validator->validate($post);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return $this->render('post/validation.html.twig', array(
                'errors' => $errorsString,
            ));
        }

        return new Response('The post is valid! Yes!');

    }

    public function successAction()
    {
        return $this->render('RokkaValidFormsBundle:Default:success.html.twig');
    }
}
