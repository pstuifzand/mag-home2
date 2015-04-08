<?php
class Peter_Week3_Block_Adminhtml_Comments extends Mage_Adminhtml_Block_Widget_Grid_Container {
    public function __construct() {
        $this->_blockGroup = 'week3';
        $this->_controller = 'adminhtml_comments';
        $this->_headerText = Mage::helper('peter_week3')->__('Comments - Peter');

        parent::__construct();
        //$this->_removeButton('add');
    }
}

