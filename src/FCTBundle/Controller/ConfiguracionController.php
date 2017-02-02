<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConfiguracionController extends Controller
{
    public function allAction()
    {

        $repository = $this->getDoctrine()->getRepository('FCTBundle:Conf');
        $Configuraciones= $repository->findAll();
        return $this->render('FCTBundle:Configuracion:all.html.twig', array("Configuraciones"=>$Configuraciones));
    }
}
