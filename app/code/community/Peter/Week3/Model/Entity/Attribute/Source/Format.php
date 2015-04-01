<?php

class Peter_Week3_Model_Entity_Attribute_Source_Format extends Mage_Eav_Model_Entity_Attribute_Source_Abstract {
    public function getAllOptions() {
        return array(
            array(
                'value' => 1,
                'label' => Mage::helper('peter_week3')->__('Standaard'),
            ),
            array(
                'value' => 2,
                'label' => Mage::helper('peter_week3')->__('Groot'),
            ),
            array(
                'value' => 3,
                'label' => Mage::helper('peter_week3')->__('Middel'),
            ),
            array(
                'value' => 4,
                'label' => Mage::helper('peter_week3')->__('Klein'),
            ),
        );
    }

    public function getFlatColums()
    {
        return array($this->getAttribute()->getAttributeCode() => array(
            'type'      => 'int',
            'unsigned'  => true,
            'is_null'   => true,
            'default'   => null,
            'extra'     => null
        ));
    }
    public function getFlatUpdateSelect($store)
    {
        return Mage::getResourceSingleton('eav/entity_attribute')
            ->getFlatUpdateSelect($this->getAttribute(), $store);
    }
}


