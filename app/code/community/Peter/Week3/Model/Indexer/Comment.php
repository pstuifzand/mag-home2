<?php

class Peter_Week3_Model_Indexer_Comment extends Mage_Index_Model_Indexer_Abstract
{
	protected function _construct()
    {
        $this->_init('week3/indexer_comment');
    }

    public function rebuildIndex() {
        $this->getResource()->rebuildIndex();
    }
}

