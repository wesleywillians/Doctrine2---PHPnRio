<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */

namespace Application\Form;

/**
 *  Artigo
 *
 * @author Administrator
 */
class Artigo extends Conteudo
{
    /**
     * Inicia o form
     */
    public function init()
    {
        $this->loadGenericElements(); //carrega campos default
        $em = $this->getEntityManager();
        $repo = $em->getRepository('app:Autor');
        
        $this->addElement('select', 'autor', array(
            'label' => 'Autor',
            'multiOptions' => $repo->getArrayAutores()
        ));
    }

    /**
     * Popula o formulario a partir da entity
     * @param object $entity 
     */
    public function setDefaultsFromEntity($artigo)
    {
        
        $this->populate(array(
            'titulo' => $artigo->getTitulo(),
            'categoria' => $artigo->getCategoria()->getId()
        ));
    }

}

?>
