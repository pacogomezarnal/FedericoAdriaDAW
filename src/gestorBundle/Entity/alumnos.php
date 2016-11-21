<?php

namespace gestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * alumnos
 *
 * @ORM\Table(name="alumnos")
 * @ORM\Entity(repositoryClass="gestorBundle\Repository\alumnosRepository")
 */
class alumnos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=255)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=255)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="ciclo", type="string", length=255)
     */
    private $ciclo;

    /**
     * @ORM\ManyToOne(targetEntity="empresa", inversedBy="alumnos")
     * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id")
    */
    private $empresa;

    //Muchos alumnos van an tener un profesor,llamamos a la entidad llamada profesor y nosotros le
    //vamos a pasar una variable llamada alumnos
    //apuntaremos a la id del profesor para saber a que profesor se refiere el profesor_id
    //de un alumno en concreto
    
    /**
     * @ORM\ManyToOne(targetEntity="profesor", inversedBy="alumnos")
     * @ORM\JoinColumn(name="profesor_id", referencedColumnName="id")
    */
    private $profesor;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return alumnos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido1
     *
     * @param string $apellido1
     *
     * @return alumnos
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     *
     * @return alumnos
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set ciclo
     *
     * @param string $ciclo
     *
     * @return alumnos
     */
    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;

        return $this;
    }

    /**
     * Get ciclo
     *
     * @return string
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }

    /**
     * Set empresa
     *
     * @param \gestorBundle\Entity\empresa $empresa
     *
     * @return alumnos
     */
    public function setEmpresa(\gestorBundle\Entity\empresa $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \gestorBundle\Entity\empresa
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set profesor
     *
     * @param \gestorBundle\Entity\profesor $profesor
     *
     * @return alumnos
     */
    public function setProfesor(\gestorBundle\Entity\profesor $profesor = null)
    {
        $this->profesor = $profesor;

        return $this;
    }

    /**
     * Get profesor
     *
     * @return \gestorBundle\Entity\profesor
     */
    public function getProfesor()
    {
        return $this->profesor;
    }
}
