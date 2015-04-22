<?php

class Peter_Week3_Model_Indexer_Comment extends Mage_Index_Model_Indexer_Abstract
{
	protected function _construct()
    {
        $this->_init('week3/indexer_comment');
    }

    public function reindexAll()
    {
        $this->getResource()->rebuildIndex();
    }

    public function getName()
    {
        return 'Week3 comment indexer';
    }

    public function getDescription()
    {
        return 'Index week3 comments';
    }


    protected function _registerEvent(Mage_Index_Model_Event $event)
    {
    }

    protected function _processEvent(Mage_Index_Model_Event $event)
    {
    }

    public function matchEvent(Mage_Index_Model_Event $event)
    {
        return false;
    }

}

