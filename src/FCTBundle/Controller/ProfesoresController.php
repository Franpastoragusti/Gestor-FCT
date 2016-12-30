<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FCTBundle\Entity\Profesores;
use FCTBundle\Form\ProfesoresType;
use Symfony\Component\HttpFoundation\Request;

class ProfesoresController extends Controller
{
  //Accion para recuperar la tabla de profesores
  public function allAction()
  {
      $repository = $this->getDoctrine()->getRepository('FCTBundle:Profesores');
      //find *all* alumnos
      $Profesores = $repository->findAll();

      return $this->render('FCTBundle:Profesores:allProfesores.html.twig', array("Profesores"=>$Profesores));
  }

  //Accion para insertar un nuevo Profesor
  public function newAction(Request $request)
  {
    //Mensaje de ok cuando se inserta un profesor
     if (isset($_GET['status'])) {
        echo "<script type=\"text/javascript\">alert(\"Enhorabuena, has inscrito un profesor correctamente\");</script>";
      }

    $profesor = new Profesores();
    $form = $this->createForm(ProfesoresType::class,$profesor);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $empresa = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $em = $this->getDoctrine()->getManager();
        $em->persist($profesor);
        $em->flush();

        return $this->redirectToRoute('new_profesor', array('status'=>'OK'));
    }

    return $this->render('FCTBundle:Profesores:new.html.twig', array('form' => $form->createView()));
  }
}
