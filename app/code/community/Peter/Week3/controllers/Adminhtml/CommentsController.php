<?php

class Peter_Week3_Adminhtml_CommentsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction() {
        $this->_title('Comments');
        $this->loadLayout();
        $this->_setActiveMenu('cms/comments');
        $this->_addContent($this->getLayout()->createBlock('week3/adminhtml_comments'));
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
}
