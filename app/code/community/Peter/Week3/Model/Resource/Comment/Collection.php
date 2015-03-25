<?php

class Peter_Week3_Model_Resource_Collection_Comment 
        extends Mage_Core_Model_Resource_Db_Collection_Abstract {

    public function _construct()
    {
        $this->_init('week3/comment');
    }

}
