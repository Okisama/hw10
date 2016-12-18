<?php

namespace Rokka\ValidFormsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RokkaValidFormsBundle:Default:index.html.twig');
    }
}
