<?php

class Peter_Week3_Block_Adminhtml_Comments_Grid extends Mage_Adminhtml_Block_Widget_Grid {
    public function __construct() {
        parent::__construct();

        $this->setId('comments');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getResourceModel('week3/comment_collection');

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
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}
