<?php

namespace empresasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmpresasController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('empresasBundle:empresa');
        //find *all* enterprises
        $empresas = $repository->findAll();
        return $this->render('empresasBundle:Empresas:all.html.twig', array("empresas"=>$empresas));
    }
}
