<?php

namespace empresasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('empresasBundle:Default:index.html.twig');
    }
}
