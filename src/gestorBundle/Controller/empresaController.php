<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class empresaController extends Controller
{
    public function allAction()
    {
    	$repository= $this->getDoctrine()->getRepository('gestorBundle:empresa');
    	// find *all* events
    	$empresas = $repository->findAll();
        return $this->render('gestorBundle:empresa:all.html.twig',array("empresas"=>$empresas));
    }
}
