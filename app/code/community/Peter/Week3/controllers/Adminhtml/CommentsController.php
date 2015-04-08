<?php

class Peter_Week3_Adminhtml_CommentsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction() {
        $this->_title('Comments');
        $this->loadLayout();
        $this->_setActiveMenu('cms/comments');
        $this->renderLayout();
    }

    public function gridAction() {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('week3/adminhtml_comments_grid')
        );
    }

    public function editAction() {
        $this->loadLayout();
        $this->_setActiveMenu('cms/comments');
        $this->renderLayout();
    }

    public function newAction() {
        $this->loadLayout();
        $this->_setActiveMenu('cms/comments');
        $this->renderLayout();
    }

    public function saveAction() {
        if ($data = $this->getRequest()->getPost()) {
            $model = Mage::getModel('week3/comment');
            $model->setData($data)->setId($this->getRequest()->getParam('id'));

            try {
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('peter_week3')->__('Item was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }

        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('peter_week3')->__('Unable to find item to save'));
        $this->_redirect('*/*/'); 
    }

    public function deleteAction() {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('week3/comment');
        $model->load($id);
        $model->delete();
        $this->_redirect('*/*/');
        return;
    }
    
}

