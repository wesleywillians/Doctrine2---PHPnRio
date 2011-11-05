<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */

namespace Application\Entity;


/**
 * Noticia
 * 
 * @Table(name="noticia")
 * @Entity(repositoryClass="Application\Entity\CrudRepository")
 * @author Administrator
 */
class Noticia extends Conteudo
{
    /**
     * @Column(type="string", name="nome_entrevistado", nullable="false")
     * @var string
     */
    protected $fonte;
    
    public function getFonte()
    {
        return $this->fonte;
    }

    public function setFonte($fonte)
    {
        $this->fonte = $fonte;
    }
}

?>
