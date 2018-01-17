<?php

namespace usuarioBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('restauranteBundle:Default:index.html.twig');
    }
    public function adminAction()
    {
        return $this->render('usuario/carpeta_cliente/admi.html.twig');
    }
}
