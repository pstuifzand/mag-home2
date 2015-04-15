<?php

class Peter_Week3_Block_Comment extends Mage_Core_Block_Template {
    public function getCollection() {
        $productId = Mage::registry('current_product')->getId();
        return Mage::getModel('week3/comment')->getCollection()
            ->addFieldToFilter('product_id', $productId);
    }
}
