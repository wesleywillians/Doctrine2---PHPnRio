<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */

namespace Application\Form;

/**
 *  Conteudo
 *
 * @author Administrator
 */
abstract class Conteudo extends \Core\Form\Crud
{
    /**
     * Carrega elementos genericos do form
     */
    public function loadGenericElements()
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository('app:Categoria');
        
        $this->addElement('text', 'titulo', array(
            'label' => 'Titulo',
            'required' => true
        ));

        $this->addElement('textarea', 'texto', array(
            'label' => 'Texto',
        ));
        
        $this->addElement('select', 'categoria', array(
            'label' => 'Categoria',
            'multiOptions' => $repo->getArrayCategorias(),
        ));
    }

}

?>
