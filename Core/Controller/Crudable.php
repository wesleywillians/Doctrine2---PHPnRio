<?php

/*
 * Workshop Doctrine 2 + ZF1
 * 
 */
namespace Core\Controller;
/**
 *
 * @author Administrator
 */
interface Crudable
{
    /**
     * Faz os setters das entidades a partir de um array
     */
    public function prepareEntity($entity, array $values);
}

?>
