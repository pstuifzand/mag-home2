<?php

class Peter_Week3_Block_Comment extends Mage_Core_Block_Abstract {
    public function getCollection() {
        return Mage::getModel('week3/comment')->getCollection();
    }
}
