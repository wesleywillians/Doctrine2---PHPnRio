<?php

namespace Core\Controller;

use Core\Controller\Crudable;

/**
 * Classe abstrata para implementar funcionalidade de CRUD do nosso sistema 
 *
 * @author Administrador
 */
abstract class Crud extends \Zend_Controller_Action implements Crudable
{
    public $entityName;    

    /**
     * Obtem container do Doctrine
     *
     * @return Bisna\Doctrine\Container
     */
    public function getDoctrineContainer()
    {
        return $this->getInvokeArg('bootstrap')->getResource('doctrine');
    }

    /**
     * Obtem o entityManager padrao do Doctrine
     *
     * @return Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->getDoctrineContainer()->getEntityManager();
    }

    /**
     * Adiciona um registro ao banco
     * @return void 
     */
    public function addAction()
    {
        $em = $this->getEntityManager(); //entity manager
        $repo = $em->getRepository('app:' . $this->entityName); //repositorio da entidade
        $formClass = 'Application\Form\\' . $this->entityName;
        $form = new $formClass;
        
        $entityClass = 'Application\Entity\\' . $this->entityName;
        $entity = new $entityClass;
        
        if ($this->getRequest()->isPost() && $form->isValid($this->getRequest()->getPost())) {
            $entity = $this->prepareEntity($entity, $form->getValues());
            
            $repo->save($entity);
            $em->flush();
            $this->_helper->redirector('index');
        }
        
        $form->addElement('submit', 'submit', array(
            'label' => 'Inserir'
        ));
        
        $this->view->form = $form;
    }

    /**
     * Edita um registro
     * @return void 
     */
    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        //verifica de algum ID foi informado
        if ($id == null) {
            throw new \Exception('Voce deve fornecer o ID do registro a ser editado');
        }
        
        $em = $this->getEntityManager(); //entity manager
        $repo = $em->getRepository('app:' . $this->entityName); //repositorio da entidade
        $formClass = 'Application\Form\\' . $this->entityName;
        $form = new $formClass;
        $entity = $em->getReference('app:' . $this->entityName, $id);
        
        if ($entity == null) {
            throw new \Exception('Registro inexistente');
        }

        if ($this->getRequest()->isPost() && $form->isValid($this->getRequest()->getPost())) {
            $entity = $this->prepareEntity($entity, $form->getValues());
            $repo->save($entity);
            $em->flush();
            $this->_helper->redirector('index');
        }

        $form->setDefaultsFromEntity($entity); // pass values to form
        
        $form->addElement('submit', 'submit', array(
            'label' => 'Alterar'
        ));
        
        $this->view->form = $form;
    }

    /**
     * Remove um registro do banco
     * @return void
     */
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        //verifica se algum ID foi fornecido
        if ($id == null)
            throw new \Exception('Voce deve fornecer o ID do registro a ser deletado');

        $em = $this->getEntityManager();
        $entity = $em->getReference('app:' . $this->entityName, $id);
        $em->remove($entity);
        $em->flush();

        $this->_helper->redirector('index');
    }

}

?>
