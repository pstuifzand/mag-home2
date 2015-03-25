<?php

class Peter_Week3_Model_Resource_Comment extends Mage_Core_Model_Resource_Db_Abstract {
    protected function _construct()
    {
        $this->_init('week3/comment', 'comment_id');
    }
}
