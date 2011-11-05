<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection,
    Application\Entity\Autor;
/**
 * Description of Categoria
 *
 * @author Administrator
 * @Table(name="categoria")
 * @Entity(repositoryClass="Application\Entity\CategoriaRepository")
 */
class Categoria
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var integer id da categoria
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string nome da categoria
     */
    protected $nome;
    /**
     * Inverse Side
     *
     * @ManyToMany(targetEntity="Categoria", mappedBy="categorias")
     * @var ArrayCollection autores desta categoria
     */
    protected $autores;
    /**
     * @OneToMany(targetEntity="Conteudo", mappedBy="categoria", cascade={"persist", "remove", "merge"})
     * @var type 
     */
    protected $conteudos;

    public function __construct()
    {
        $this->autores = new ArrayCollection;
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
    
    public function addAutor()
    {
        
    }

}

?>
