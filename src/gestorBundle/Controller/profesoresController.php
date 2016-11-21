<?php

namespace gestorBundle\Controller;

#Llamamos a diferentes varibles para poder usarlas en el controlador
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\profesor;

//llamamos a el formulario para crear un nuevo profesor
use gestorBundle\Form\profesorType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;

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
    	return $this->render('gestorBundle:profesores:nuevo.html.twig',array("formularioProfesor"=>$form->createView() ));
    }


    //función para convertir los datos de cada profesor en un array
    private function serializeProfesor(Profesor $profesor)
    {
	//guardamos los datos de cada profesor en un array para que el JSON sea más legible
      return array(
          'identificador' => $profesor->getId(),
          'nombre' => $profesor->getNombre(),
          'apellidos' => $profesor->getApellidos(),
          'departamento' => $profesor->getDepartamento(),
      );
    }


    //mediante este comando vamos a generar un JSON con los datos de todos los profesores
	function JSONAction()
	{
		//obtenemos la tabla profesor
    	$repository= $this->getDoctrine()->getRepository('gestorBundle:profesor');

    	//guardamos todos los profesores encontrados
    	$profesores = $repository->findAll();

    	//preparamos una función $data que va a contener en un futuro a todos los profesores
       $data=array('profesores'=>array());

       //para cada fila, es decir, para cada profesor vamos a realizar la siguiente acción
       foreach ($profesores as $profesor) {

       	//guardamos en $data los datos de la fila en forma de un array
       	$data['profesores'][]=$this->serializeProfesor($profesor);
       }

       //mostramos un JSON con los datos de los profesores, mostramos el código 200 para saber que todo ha ido correctamente
       $response=new JsonResponse($data, 200);
       return $response;
     }

}