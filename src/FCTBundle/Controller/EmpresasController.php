<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FCTBundle\Entity\Empresas;
use FCTBundle\Form\EmpresasType;
use Symfony\Component\HttpFoundation\Request;


class EmpresasController extends Controller
{
    public function allAction()
    {


        $repository = $this->getDoctrine()->getRepository('FCTBundle:Empresas');
        //find *all* enterprises
        $Empresas = $repository->findAll();
        return $this->render('FCTBundle:Empresas:all.html.twig', array("Empresas"=>$Empresas));
    }

    public function newAction(Request $request)
    {

       if (isset($_GET['status'])) {
          echo "<script type=\"text/javascript\">alert(\"Enhorabuena, has inscrito tu empresa correctamente\");</script>";
        }

      $empresa = new Empresas();
      $form = $this->createForm(EmpresasType::class,$empresa);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          // $form->getData() holds the submitted values
          // but, the original `$task` variable has also been updated
          $empresa = $form->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $em = $this->getDoctrine()->getManager();
          $em->persist($empresa);
          $em->flush();

          return $this->redirectToRoute('new_empresas', array('status'=>'OK'));
      }

      return $this->render('FCTBundle:Empresas:new.html.twig', array('form' => $form->createView()));
    }
}
