<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FCTBundle\Entity\Empresas;
use FCTBundle\Form\EmpresasType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    public function indexAction()
    {
        return $this->render('FCTBundle:Default:index.html.twig');
    }


    public function showEmpresasAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('FCTBundle:Empresas');
        $empresas = $repository->findAll();


        //var_dump($empresas);
        $data = array('empresas' => array());

        foreach ($empresas as $empresa) {
            $data['empresas'][] = $empresa->serialize();
        }
        $response = new JsonResponse($data, 200);
        return $response;
        //return $this->json($empresas);*/
    }
    
    //metodo get para recuperar por API los profesores
    public function showProfesoresAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('FCTBundle:Profesores');
        //hacemos el select sobre la base de datos
        $profesores = $repository->findAll();


        //var_dump($empresas);
        $data = array('profesores' => array());
        //recorremos los datos serializandolos para el JSON
        foreach ($profesores as $profesor) {
            $data['profesores'][] = $profesor->serialize();
        }
        //Devolvemos un JSON con los datos y con estado 200
        $response = new JsonResponse($data, 200);
        //Devolvemos el JSON con los datos
        return $response;
        //return $this->json($empresas);*/
    }


    public function insertEmpresaAction(Request $request)
    {

          //'{"id": 1,"nombre": "Nestlé","direccion": "Avinguda Països Catalans, 51, Barcelona","cp": 8950,"telefono1": 987878766,"telefono2": 978784588,"fecha_creacion": "1987-10-19 00:00:00.000000"}';
          $connection = $this->getDoctrine()->getManager();
          $empresa = new Empresas();
          $content = $request->getContent();
          $data = json_decode($content);
          $empresa = $empresa->deserialize($data, $empresa);
          $connection->persist($empresa);
          $connection->flush();
          if ($empresa->getId() > 0) {
            $response = new JsonResponse(array('status' => 'ok'), 200);
          }else {
            $response = new JsonResponse(array('status' => 'ko'), 200);
          }
          echo $empresa->getId();
          return $response;

    }

}
