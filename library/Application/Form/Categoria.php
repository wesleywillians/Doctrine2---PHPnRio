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
class Categoria extends Crud
{   
    public function init()
    {   
        $this->addElement('text', 'nome', array(
            'label' => 'Nome da Categoria',
            'required' => true
        ));
    }

    public function setDefaultsFromEntity($entity)
    {
        $this->populate(array(
            'nome' => $entity->getNome()
        ));
    }
}

?>
