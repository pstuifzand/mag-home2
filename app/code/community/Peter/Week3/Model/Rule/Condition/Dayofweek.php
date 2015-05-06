<?php

class Peter_Week3_Model_Rule_Condition_Dayofweek extends Mage_Rule_Model_Condition_Abstract
{
    public function loadAttributeOptions()
    {
        $attributes = array(
            'day_of_week' => Mage::helper('peter_week3')->__('Day of week'),
        );
        $this->setAttributeOption($attributes);
        return $this;
    }
    public function getAttributeElement()
    {
        $element = parent::getAttributeElement();
        $element->setShowAsText(true);
        return $element;
    }
    public function getInputType()
    {
        return 'select';
    }
    public function getValueElementType()
    {
        return 'select';
    }
    public function getValueSelectOptions()
    {
        if (!$this->hasData('value_select_options')) {
            $options = array(
                array('value' => 1, 'label' => Mage::helper('peter_week3')->__('Monday')),
                array('value' => 2, 'label' => Mage::helper('peter_week3')->__('Tuesday')),
                array('value' => 3, 'label' => Mage::helper('peter_week3')->__('Wednesday')),
                array('value' => 4, 'label' => Mage::helper('peter_week3')->__('Thursday')),
                array('value' => 5, 'label' => Mage::helper('peter_week3')->__('Friday')),
                array('value' => 6, 'label' => Mage::helper('peter_week3')->__('Saterday')),
                array('value' => 7, 'label' => Mage::helper('peter_week3')->__('Sunday')),
            );
            $this->setData('value_select_options', $options);
        }
        return $this->getData('value_select_options');
    }
    public function validate(Varien_Object $object)
    {
        $object->setDayofweek(date('N'));
        return parent::validate($object);
    }
    public function getNewChildSelectOptions()
    {
        return array(
            array(
                'value' => $this->getValueSelectOptions(),
                'label' => Mage::helper('peter_week3')->__('Day of week')
            )
        );
    }
}
