<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\alumnos;

class alumnoController extends Controller
{
	function alumnosAllAction()
	{
    	$repository= $this->getDoctrine()->getRepository('gestorBundle:alumnos');
    	// encontrar todos los alumnos
    	$alumnos = $repository->findAll();
        return $this->render('gestorBundle:alumno:all.html.twig',array("alumnos"=>$alumnos));
    }
}