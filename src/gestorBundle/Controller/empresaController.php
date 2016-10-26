<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\empresa;
use gestorBundle\Form\empresaType;
use Symfony\Component\HttpFoundation\Request;

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
    	$empresa->setNombre("Oh my PHP");
    	$empresa->setDireccion("Valencia");
    	$empresa->setCp(46900);
    	$empresa->setTelefono1(934562187);
    	$empresa->setTelefono2(604982351);

    	//Doctrine
    	$mangDoct=$this->getDoctrine()->getManager();
    	$mangDoct->persist($empresa);
    	$mangDoct->flush($empresa);
    	return $this->render('gestorBundle:empresa:crearEmpresa.html.twig',array("empresaId"=>$empresa->getId()));
    }

    public function nuevaEmpresaAction(Request $request)//cambiar esto por la URL que queramos
    {
    	$empresa=new empresa();
    	$form= $this->createForm(empresaType::class);

    	$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {
    		// $form->getData() holds the submitted values
    		// but, the original '$task' variable has also been updated
    		$empresa = $form->getData();

    		// ... perform some action, such as saving the task to the database
    		// for example, if Task is a Doctrine entity, save it!
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($empresa);
    		$em->flush();

    		//return $this->redirectToRoute('/empresa/msgExito');//no va
    	}
    	return $this->render('gestorBundle:empresa:nuevaEmpresa.html.twig',array("form"=>$form->createView() ));
    }

    public function msgExitoAction()
    {
        return $this->render('gestorBundle:empresa:msgExito.html.twig');
    }
}
