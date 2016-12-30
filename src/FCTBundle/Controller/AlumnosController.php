<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlumnosController extends Controller
{
  public function allAction()
  {
      $repository = $this->getDoctrine()->getRepository('FCTBundle:Alumnos');
      //find *all* alumnos
      $Alumnos = $repository->findAll();

      return $this->render('FCTBundle:Alumnos:allAlumnos.html.twig', array("Alumnos"=>$Alumnos));
  }
}
