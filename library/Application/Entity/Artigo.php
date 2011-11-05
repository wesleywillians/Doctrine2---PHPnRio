<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */

namespace Application\Entity;

use Application\Entity\Autor;

/**
 * Artigo
 * 
 * @Entity(repositoryClass="Application\Entity\CrudRepository")
 * @author Administrator
 */
class Artigo extends Conteudo
{
    /**
     * @ManyToOne(targetEntity="Autor", inversedBy="postagens")
     * @var Autor
     */
    protected $autor;

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor(Autor $autor)
    {
        $this->autor = $autor;
    }
}

?>
