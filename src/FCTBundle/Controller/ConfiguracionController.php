<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FCTBundle\Entity\Conf;
use FCTBundle\Form\ConfType;
use Symfony\Component\HttpFoundation\Request;

class ConfiguracionController extends Controller
{
    public function allAction()
    {
        //Listamos todas las configuraciones
        $repository = $this->getDoctrine()->getRepository('FCTBundle:Conf');
        $Configuraciones= $repository->findAll();
        return $this->render('FCTBundle:Configuracion:all.html.twig', array("Configuraciones"=>$Configuraciones));
    }

    public function newAction(Request $request)
    {

       if (isset($_GET['status'])) {
          echo "<script type=\"text/javascript\">alert(\"Enhorabuena, has inscrito otra configuración\");</script>";
        }
      //Sacamos el formulario  para inscribir una nueva configuracion
      $configuracion = new Conf();
      $form = $this->createForm(ConfType::class,$configuracion);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          // $form->getData() holds the submitted values
          // but, the original `$task` variable has also been updated
          $configuracion = $form->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $em = $this->getDoctrine()->getManager();
          $em->persist($configuracion);
          $em->flush();

          return $this->redirectToRoute('conf_new', array('status'=>'OK'));
      }

      return $this->render('FCTBundle:Configuracion:new.html.twig', array('form' => $form->createView()));
    }
}
