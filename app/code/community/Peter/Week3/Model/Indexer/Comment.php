<?php

class Peter_Week3_Model_Indexer_Comment extends Mage_Index_Model_Indexer_Abstract
{
    const EVENT_MATCH_RESULT_KEY = 'peter_week3_indexer_comment_match_result';

    protected $_matchedEntities = array(
        Mage_Catalog_Model_Product::ENTITY => array(
            Mage_Index_Model_Event::TYPE_SAVE,
            Mage_Index_Model_Event::TYPE_MASS_ACTION,
            Mage_Index_Model_Event::TYPE_DELETE
        )
    );

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
        Mage::log('_registerEvent');
    }

    protected function _processEvent(Mage_Index_Model_Event $event)
    {
        Mage::log('_processEvent');
    }

    public function matchEvent(Mage_Index_Model_Event $event)
    {
        Mage::log('matchEvent');
        Mage::log($event);
        return false;
    }

}

