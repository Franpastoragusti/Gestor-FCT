<?php

namespace FCTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumnos
 *
 * @ORM\Table(name="alumnos", indexes={@ORM\Index(name="IDX_5EC5A6AB602B00EE", columns={"empresas_id"}), @ORM\Index(name="IDX_5EC5A6ABDC431A97", columns={"profesores_id"})})
 * @ORM\Entity
 */
class Alumnos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=255, nullable=false)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=255, nullable=false)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="ciclo", type="string", length=255, nullable=false)
     */
    private $ciclo;

    /**
     * @var \Empresas
     *
     * @ORM\ManyToOne(targetEntity="Empresas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empresas_id", referencedColumnName="id")
     * })
     */
    private $empresas;

    /**
     * @var \Profesores
     *
     * @ORM\ManyToOne(targetEntity="Profesores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profesores_id", referencedColumnName="id")
     * })
     */
    private $profesores;



    /**
     * Get id
     *
     * @return integer
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
     * @return Alumnos
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
     * @return Alumnos
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
     * @return Alumnos
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
     * @return Alumnos
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
     * Set empresas
     *
     * @param \FCTBundle\Entity\Empresas $empresas
     *
     * @return Alumnos
     */
    public function setEmpresas(\FCTBundle\Entity\Empresas $empresas = null)
    {
        $this->empresas = $empresas;

        return $this;
    }

    /**
     * Get empresas
     *
     * @return \FCTBundle\Entity\Empresas
     */
    public function getEmpresas()
    {
        return $this->empresas;
    }

    /**
     * Set profesores
     *
     * @param \FCTBundle\Entity\Profesores $profesores
     *
     * @return Alumnos
     */
    public function setProfesores(\FCTBundle\Entity\Profesores $profesores = null)
    {
        $this->profesores = $profesores;

        return $this;
    }

    /**
     * Get profesores
     *
     * @return \FCTBundle\Entity\Profesores
     */
    public function getProfesores()
    {
        return $this->profesores;
    }
}
