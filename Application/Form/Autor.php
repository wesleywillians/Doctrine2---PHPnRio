<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */

namespace Application\Form;

use Core\Form\Crud;

/**
 *  Autor
 *
 * @author Administrator
 */
class Autor extends Crud
{
    /**
     * Inicia o form
     */
    public function init()
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository('app:Categoria');
        
        $this->addElement('text', 'nome', array(
            'label' => 'Nome do autor',
            'required' => true
        ));

        $this->addElement('multiSelect', 'categorias', array(
            'label' => 'Categorias',
            'multiOptions' => $repo->getArrayCategorias()
        ));
    }

    /**
     * Popula o formulario a partir da entity
     * @param object $entity 
     */
    public function setDefaultsFromEntity($autor)
    {
        $categorias = array();
        
        foreach ($autor->getCategorias() as $categoria) {
           $categorias[] = $categoria->getId();
        }
        
        $this->populate(array(
            'nome' => $autor->getNome(),
            'categorias' => $categorias
        ));
    }

}

?>
