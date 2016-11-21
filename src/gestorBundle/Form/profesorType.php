<?php

namespace gestorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//Llamamos a los tipos de datos que queremos usar en el formulario, como un texto
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class profesorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
        Cada campo del formulario va a tener un nombre, un tipo, en este caso al ser todos
        un texto usaremos la clase TextType. Por último ponemos un array con diversas etiquetas
        para poder aplicarle un determinado estilo al formulario. También usamos un botón para
        guardar los datos y otro botón para borrar todo en caso de que nos hayamos equivocado
        */
        $builder
            ->add('nombre',TextType::class,array('label'=>'Nombre del profesor',
                                                    'label_attr'=>array('class'=>'etiqueta'),
                                                    'attr'=>array('class'=>'etiqueta_elem')))
            ->add('apellidos',TextType::class,array('label'=>'Apellidos del profesor',
                                                    'label_attr'=>array('class'=>'etiqueta'),
                                                    'attr'=>array('class'=>'etiqueta_elem')))
            ->add('departamento',TextType::class,array('label'=>'Departamento del profesor',
                                                    'label_attr'=>array('class'=>'etiqueta'),
                                                    'attr'=>array('class'=>'etiqueta_elem')))
            ->add('Salvar',SubmitType::class)
            ->add('Borrar',ResetType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'gestorBundle\Entity\profesor'
        ));
    }
}
