<?php

namespace Arca\EmpresaBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Arca\EmpresaBundle\Entity\Categoria;
/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity(repositoryClass="Arca\EmpresaBundle\Repository\EmpresaRepository")
 */
class Empresa
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $imagem;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=16)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=255)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=9)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=255)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @ORM\ManyToMany(targetEntity="Arca\EmpresaBundle\Entity\Categoria")
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(onDelete="CASCADE")}
     * )
     */
    private $categorias;

    public function __construct()
    {
        $this->categorias = new ArrayCollection();
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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Empresa
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Empresa
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Empresa
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set cep
     *
     * @param string $cep
     *
     * @return Empresa
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Empresa
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Empresa
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Empresa
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function __toString()
    {
        return (string) $this->getTitulo();
    }

    public function setCategorias($categoria)
    {
        $this->categorias = $categoria;

        return $this;
    }
    public function getCategorias()
    {
        return $this->categorias;
    }

}

