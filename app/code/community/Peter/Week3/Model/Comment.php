<?php

class Peter_Week3_Model_Comment extends Mage_Core_Model_Abstract
{
    const ENTITY                 = 'week3_comment';

	protected function _construct()
    {
        $this->_init('week3/comment');
    }

    protected function _afterSave()
    {
        Mage::getSingleton('index/indexer')->logEvent(
            $this, self::ENTITY, Mage_Index_Model_Event::TYPE_SAVE
        );
    }

    protected function _beforeDelete()
    {
        Mage::getSingleton('index/indexer')->logEvent(
            $this, self::ENTITY, Mage_Index_Model_Event::TYPE_DELETE
        );
    }
}
