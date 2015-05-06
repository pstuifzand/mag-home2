<?php

class Peter_Week3_Model_Observer {
    public function saleRuleConditionCombine($observer) {
        $model = Mage::getModel('week3/rule_condition_dayofweek');
        $options = $model->getNewChildSelectOptions();
        $observer->getEvent()->setAdditional($options);
    }
}
