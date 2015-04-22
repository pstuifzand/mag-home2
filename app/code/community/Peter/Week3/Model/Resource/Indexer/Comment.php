<?php

class Peter_Week3_Model_Resource_Indexer_Comment extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('week3/indexer_comment', 'comment_id');
        $this->_isPkAutoIncrement = false;
    }

    public function rebuildIndex() {
        $collection = Mage::getModel('week3/comment')->getCollection();

        foreach ($collection as $comment) {
            $idx_comment = Mage::getModel('week3/indexer_comment');
            $idx_comment->setCommentId($comment->getCommentId());
            $idx_comment->setProductId($comment->getProductId());
            $idx_comment->save();
        }
    }
}
