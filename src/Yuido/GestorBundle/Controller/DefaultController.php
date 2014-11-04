<?php

namespace Yuido\GestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('YuidoGestorBundle:Default:index.html.twig', array('name' => $name));
    }
    
}
