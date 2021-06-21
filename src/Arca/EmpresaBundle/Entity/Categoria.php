<?php

namespace Arca\EmpresaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Arca\EmpresaBundle\Entity\Empresa;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity(repositoryClass="Arca\EmpresaBundle\Repository\CategoriaRepository")
 */
class Categoria
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
     * @ORM\Column(name="categoria", type="string", length=255)
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="Arca\EmpresaBundle\Entity\Empresa", mappedBy="categoria")
     */
    private $empresas;
    public function __construct()
    {
        $this->empresas = new ArrayCollection();
    }
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
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @return mixed
     */
    public function getEmpresas()
    {
        return $this->empresas;
    }
    public function __toString()
    {
        return (string) $this->getEmpresas();
    }
}

