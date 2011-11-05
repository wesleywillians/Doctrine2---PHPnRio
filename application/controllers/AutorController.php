<?php

class AutorController extends Core\Controller\Crud
{

    public $entityName = 'Autor';

    public function prepareEntity($autor, array $values)
    {
        $em = $this->getEntityManager();

        extract($values);
        $autor->setNome($nome);
        $autor->getCategorias()->clear();
        
        foreach ($values['categorias'] as $idCategoria) {
            $categoria = $em->getReference('app:Categoria', $idCategoria);
            $autor->addCategoria($categoria);
        }
        
        return $autor;
    }

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository('app:Autor');
        $this->view->autores = $repo->findAll();
    }

}

