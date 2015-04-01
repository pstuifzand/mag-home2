<?php

class Peter_Week3_Model_Resource_Comment2 extends Mage_Eav_Model_Entity_Abstract {
    public function __construct() {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('week3_comment2');
        $this->setConnection(
            $resource->getConnection('comment_read'),
            $resource->getConnection('comment_write')
        );
    }
}
