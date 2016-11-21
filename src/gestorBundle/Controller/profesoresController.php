<?php

namespace gestorBundle\Controller;

#Llamamos a diferentes varibles para poder usarlas en el controlador
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\profesor;
use Symfony\Component\HttpFoundation\Request;

#creamos una clase llamada profesoresController
class profesoresController extends Controller
{
	#función que va a permitir ver a todos los profesores
    public function allAction()
    {
    	#$repository es una variable que va a almacenar la tabla profesor al completo
    	$repository= $this->getDoctrine()->getRepository('gestorBundle:profesor');

    	#$profesores va a almacenar todos los profesores que hay en la base de datos,
    	#estos datos son almacenados en forma de un array
    	$profesores = $repository->findAll();

    	#le pasamos a un fichero all.html.twig situado en la carpeta profesores dentro de views
    	#este array se llamará en el fichero HTML mediante profesores
        return $this->render('gestorBundle:profesores:all.html.twig',array("profesores"=>$profesores));
    }

    public function nuevoProfesorAction(Request $request)//Función llamada nuevoProfesor
    {
    	//creamos la vaiable profesor para guardar los datos del nuevo profesor que indicaremos en el formulario
    	$profesor=new profesor();

    	//guardamos en $form el formulario de la entidad profesor
    	$form= $this->createForm(profesorType::class);

    	//comprobamos que se ha rellenado el formulario y los datos son válidos
    	$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {

    		// $form->getData() obtiene los datos del nuevo profesor
    		$profesor = $form->getData();

    		// mediante $em obtenemos en Manager que nos va a permitir almacenar en la base de datos el nuevo profesor
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($profesor);
    		$em->flush();

    		//si todo lo anterior ha funcionado, iremos a la ruta que muestra una tabla con todos los profesores
    		return $this->redirectToRoute('todosProfesores');
    	}
    	return $this->render('gestorBundle:empresa:nuevaEmpresa.html.twig',array("form"=>$form->createView() ));
    }
}