<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\empresa;
use Symfony\Component\HttpFoundation\JsonResponse;

class empresasAPIController extends Controller
{
    private function serializeEmpresa(Empresa $empresa)
    {
      return array(
          'nombre' => $empresa->getNombre(),
          'direccion' => $empresa->getDireccion(),
          'cp' => $empresa->getCp(),
          'telefono1' => $empresa->getTelefono1(),
          'nombre' => $empresa->getNombre(),
          'telefono2' => $empresa->getTelefono2(),
          'fechaCreacion' => $empresa->getFechaCreacion(),
      );
    }

	function generarJSONAction()
	{
    	$repository= $this->getDoctrine()->getRepository('gestorBundle:empresa');
    	$empresas = $repository->findAll();
       $data=array('empresas'=>array());
       foreach ($empresas as $empresa) {
       	$data['empresas'][]=$this->serializeEmpresa($empresa);
       }
       $response=new JsonResponse($data, 200);
       return $response;
     }
}