<?php

class Peter_Week3_Block_Adminhtml_Comments_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
    protected function _prepareForm() {
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                'method'  => 'post',
                'enctype' => 'multipart/form-data'
            )
        );
        $form->setUseContainer(true);
        $this->setForm($form);

        $fieldset = $form->addFieldset(
            'base_fieldset',
            array(
                'legend' => Mage::helper('peter_week3')->__('General Information'),
            )
        );

        $fieldset->addField(
            'comment', # the input id
            'text', # the type
            array(
                'label'    => Mage::helper('peter_week3')->__('Comment'),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'comment',
            )
        );

        return parent::_prepareForm();
    }
}
