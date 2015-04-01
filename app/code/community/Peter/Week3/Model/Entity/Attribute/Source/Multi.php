<?php 

class Peter_Week3_Model_Entity_Attribute_Source_Multi extends Mage_Eav_Model_Entity_Attribute_Source_Abstract {
    public function getAllOptions() {
        return array(
            array(
                'value' => 1,
                'label' => Mage::helper('peter_week3')->__('Standaard'),
            ),
            array(
                'value' => 2,
                'label' => Mage::helper('peter_week3')->__('Wanbetaler'),
            ),
            array(
                'value' => 3,
                'label' => Mage::helper('peter_week3')->__('Supertopper'),
            ),
            array(
                'value' => 4,
                'label' => Mage::helper('peter_week3')->__('Medewerker'),
            ),
        );
    }
}

