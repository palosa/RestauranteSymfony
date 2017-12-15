<?php

namespace restauranteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('restauranteBundle:Default:index.html.twig');
    }
}
