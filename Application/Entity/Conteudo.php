<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */
namespace Application\Entity;

use Application\Entity\Categoria;

/**
 *  Autor
 * @Table(name="conteudo")
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="tipo", type="string")
 * @DiscriminatorMap({"a" = "Artigo", "e" = "Entrevista", "n" = "Noticia"})
 * @author Administrator
 */
abstract class Conteudo
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer id do conteudo
     */
    protected $id;
    /**
     * @Column(type="string", nullable="false")
     * @var string nome do autor
     */
    protected $titulo;
    /**
     * @Column(type="string", nullable="false")
     * @var string texto do conteudo
     */
    protected $texto;
    /**
     * @ManyToOne(targetEntity="Categoria", inversedBy="conteudos")
     * @var Categoria
     */
    protected $categoria;
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }
}