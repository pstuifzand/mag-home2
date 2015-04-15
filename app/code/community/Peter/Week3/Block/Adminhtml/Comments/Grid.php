<?php

class Peter_Week3_Block_Adminhtml_Comments_Grid extends Mage_Adminhtml_Block_Widget_Grid
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    public function __construct() {
        parent::__construct();
        $this->_blockGroup = 'week3';
        $this->_controller = 'adminhtml_comments';

        $this->setId('comments');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    public function getTabUrl()
    {
        return $this->getUrl('*/*/commentGrid', array('_current'=>true));
    }

    public function getTabClass()
    {
        return 'ajax';
    }
    public function getTabLabel()
    {
        return Mage::helper('peter_week3')->__('Comments');
    }
    public function getTabTitle()
    {
        return Mage::helper('peter_week3')->__('Comments');
    }
    public function _getProduct() {
        return Mage::registry('current_product');
    }
    protected function _prepareCollection() {
        $collection = Mage::getResourceModel('week3/comment_collection');

        if ($this->_getProduct()) {
            $collection->addFieldToFilter('product_id', $this->_getProduct()->getId());
        }

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns() {
        $helper = Mage::helper('peter_week3');
        $this->addColumn('comment_id', array(
            'header' => '#',
            'index'  => 'comment_id',
        ));
        $this->addColumn('product_id', array(
            'header' => $helper->__('Product ID'),
            'index'  => 'product_id',
        ));
        $this->addColumn('comment', array(
            'header' => $helper->__('Message'),
            'index'  => 'comment',
        ));
        return parent::_prepareColumns();
    }

    public function getGridUrl() {
        return $this->getUrl('*/comments/grid', array('_current'=>true));
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/comments/edit', array('id' => $row->getId()));
    }
    public function canShowTab()
    {
        return true;
    }
    public function isHidden()
    {
        return false;
    }
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('comment_id');
        $this->getMassactionBlock()->setFormFieldName('comment_id');
         
        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> Mage::helper('peter_week3')->__('Delete'),
            'url'  => $this->getUrl('*/*/massDelete', array('' => '')),        // public function massDeleteAction() in Mage_Adminhtml_Tax_RateController
            'confirm' => Mage::helper('peter_week3')->__('Are you sure?')
        ));
         
        return $this;
    }
}
