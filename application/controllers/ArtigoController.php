<?php

class ArtigoController extends Core\Controller\Crud
{

    public $entityName = 'Artigo';

    public function prepareEntity($artigo, array $values)
    {
        $em = $this->getEntityManager();
        extract($values);
        $artigo->setTitulo($titulo);
        $artigo->setTexto($texto);
        
        $categoria = $em->getReference('app:Categoria', $categoria);
        $artigo->setCategoria($categoria);
        
        $autor = $em->getReference('app:Autor', $autor);
        $artigo->setAutor($autor);
        
        return $artigo;
    }

    public function indexAction()
    {
        $em = $this->getEntityManager();
        
        //buscando por repositorio
        $repo = $em->getRepository('app:Artigo');
        $artigos = $repo->findAll();
        
        //buscando DQL
        $dql = 'SELECT a.id, a.titulo, c.nome as categoria, au.nome as autor FROM app:Artigo a JOIN a.categoria c JOIN a.autor au';
        $q = $em->createQuery($dql);
        $artigos = $q->getArrayResult();
        
        //\Zend_Debug::dump($artigos); exit;
        
        $this->view->artigos = $artigos;
    }

}

