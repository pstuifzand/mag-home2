<?php

class Peter_Week3_Block_Adminhtml_Comments_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    public function __construct() {
        parent::__construct();

        $this->_objectId   = 'id'; # this is the param we look for in the url to load the entity
        $this->_controller = 'adminhtml_comments'; # same as the grid container
        $this->_blockGroup = 'week3'; # same as the grid container
        $this->_updateButton('save', 'label', Mage::helper('peter_week3')->__('Save comment')); # sets the text for the save button
        $this->_updateButton('delete', 'label', Mage::helper('peter_week3')->__('Delete comment')); # sets the text for the delete button
        # adds a save and continue edit button, not needed but nice
        $this->_addButton(
            'save_and_edit_button',
            array(
                'label'     => Mage::helper('peter_week3')->__('Save and Continue Edit'),
                'onclick'   => 'saveAndContinueEdit()',
                'class'     => 'save'
            ),
            100
        );
    }

}

