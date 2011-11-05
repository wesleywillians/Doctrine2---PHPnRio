<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */
namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection,
    Application\Entity\Categoria;

/**
 *  Autor
 * @Table(name="autor")
 * @Entity(repositoryClass="Application\Entity\AutorRepository")
 * @author Administrator
 */
class Autor
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     * @var integer id do autor
     */
    protected $id;
    /**
     * @Column(type="string", nullable="false")
     * @var string nome do autor
     */
    protected $nome;
    /**
     * Owning Side
     *
     * @ManyToMany(targetEntity="Categoria", inversedBy="autores")
     * @JoinTable(name="autor_categoria",
     *      joinColumns={@JoinColumn(name="autor_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="categoria_id", referencedColumnName="id")}
     *      )
     * @var ArrayCollection
     */
    protected $categorias;
    
    public function __construct()
    {
        $this->categorias = new ArrayCollection;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCategorias()
    {
        return $this->categorias;
    }
    
    public function addCategoria(Categoria $categoria)
    {
        $this->categorias[] = $categoria;
    }
}

?>
