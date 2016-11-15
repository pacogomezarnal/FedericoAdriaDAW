<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\empresa;
use Symfony\Component\Serializer\Encoder\JsonResponse;

class empresasAPIController extends Controller
{
	function generarJSONAction()
	{
    	$repository= $this->getDoctrine()->getRepository('gestorBundle:empresa');
    	// encontrar todos los alumnos
    	$empresas = $repository->findAll();
       $data=array('empresas'=>array());
       foreach ($empresas as $empresa) {
       	$data['empresas'][]=$this->serializeEmpresa($empresa);
       }
       $response=new JsonResponse($data, 400);
       return $response;
     }
}