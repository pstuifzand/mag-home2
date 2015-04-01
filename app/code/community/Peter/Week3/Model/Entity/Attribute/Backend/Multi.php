<?php

class Peter_Week3_Model_Entity_Attribute_Backend_Multi extends Mage_Eav_Model_Entity_Attribute_Backend_Abstract {
    public function beforeSave($object) {
        $attributeCode = $this->getAttribute()->getAttributeCode();
        $data = $object->getData($attributeCode);
        if (is_array($data)) {
            $data = array_filter($data);
            $object->setData($attributeCode, implode(',', $data));
        }

        return parent::beforeSave($object);
    }
}
