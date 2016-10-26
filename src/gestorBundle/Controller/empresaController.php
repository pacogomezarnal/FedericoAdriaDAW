<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\empresa;

class empresaController extends Controller
{
    public function allAction()
    {
    	$repository= $this->getDoctrine()->getRepository('gestorBundle:empresa');
    	// find *all* events
    	$empresas = $repository->findAll();
        return $this->render('gestorBundle:empresa:all.html.twig',array("empresas"=>$empresas));
    }

    public function crearEmpresaAction()
    {
    	//Nuevo objeto de tipo Empresa
    	$empresa = new empresa();
    	$empresa->setNombre("ValenciaSoft");
    	$empresa->setDireccion("Barcelona");
    	$empresa->setCp(45699);
    	$empresa->setTelefono1(961568874);
    	$empresa->setTelefono2(607460445);

    	//Doctrine
    	$mangDoct=$this->getDoctrine()->getManager();
    	$mangDoct->persist($empresa);
    	$mangDoct->flush($empresa);
    	return $this->render('gestorBundle:empresa:crearEmpresa.html.twig',array("empresaId"=>$empresa->getId()));
    }
}
