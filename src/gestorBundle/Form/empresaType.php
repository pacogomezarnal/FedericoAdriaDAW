<?php

namespace gestorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class profesorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,array('label'=>'Nombre de la empresa',
                                                    'label_attr'=>array('class'=>'etiqueta'),
                                                    'attr'=>array('class'=>'etiqueta_elem')))
            ->add('direccion',TextType::class,array('label'=>'Dirección de la empresa',
                                                    'label_attr'=>array('class'=>'etiqueta'),
                                                    'attr'=>array('class'=>'etiqueta_elem')))
            ->add('cp',IntegerType::class,array('label'=>'Código Postal',
                                                    'label_attr'=>array('class'=>'etiqueta'),
                                                    'attr'=>array('class'=>'etiqueta_elem')))
            ->add('telefono1',IntegerType::class,array('label'=>'Teléfono 1',
                                                    'label_attr'=>array('class'=>'etiqueta'),
                                                    'attr'=>array('class'=>'etiqueta_elem')))
            ->add('telefono2',IntegerType::class,array('label'=>'Teléfono 2',
                                                    'label_attr'=>array('class'=>'etiqueta'),
                                                    'attr'=>array('class'=>'etiqueta_elem')))
            ->add('fechaCreacion',DateType::class,array('label'=>'Fecha de creación',
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
            'data_class' => 'gestorBundle\Entity\empresa'
        ));
    }
}
