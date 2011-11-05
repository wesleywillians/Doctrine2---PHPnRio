<?php

class CategoriaController extends Core\Controller\Crud
{

    public $entityName = 'Categoria';

    public function prepareEntity($categoria, array $values)
    {
        extract($values);
        $categoria->setNome($nome);
        return $categoria;
    }

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository('app:Categoria');
        $this->view->categorias = $repo->findAll();
    }

}

