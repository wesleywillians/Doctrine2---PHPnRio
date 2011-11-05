<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */
namespace Core\Form;
/**
 *
 * @author Administrator
 */
interface Crudable
{
    /**
     * Popula o form a partir da entidade
     */
    public function setDefaultsFromEntity($entity);
}

?>
