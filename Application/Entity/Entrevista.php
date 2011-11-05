<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */

namespace Application\Entity;


/**
 * Entrevista
 * 
 * @Table(name="entrevista")
 * @Entity(repositoryClass="Application\Entity\CrudRepository")
 * @author Administrator
 */
class Entrevista extends Conteudo
{
    /**
     * @Column(type="string", name="nome_entrevistado", nullable="false")
     * @var string
     */
    protected $entrevistado;

    public function getEntrevistado()
    {
        return $this->entrevistado;
    }

    public function setEntrevistado($entrevistado)
    {
        $this->entrevistado = $entrevistado;
    }


}

?>
