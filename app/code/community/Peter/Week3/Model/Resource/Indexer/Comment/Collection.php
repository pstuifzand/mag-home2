<?php

class Peter_Week3_Model_Resource_Indexer_Comment_Collection
    extends Mage_Catalog_Model_Resource_Collection_Abstract {

    protected function _construct() {
        $this->_init('week3/indexer_comment');
    }
}
