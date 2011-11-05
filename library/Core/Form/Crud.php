<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */

namespace Core\Form;

/**
 *  Crud
 *
 * @author Administrator
 */
abstract class Crud extends \Zend_Form implements Crudable
{

    /**
     * Retorna o EntityManager
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager($name = null)
    {
        /** @var \Doctrine\ORM\EntityManager */
        $em = \Zend_Registry::get('doctrine')->getEntityManager($name);
        return $em;
    }

}