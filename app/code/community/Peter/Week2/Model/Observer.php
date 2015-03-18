<?php

class Peter_Week1_Model_Observer {
    public function __construct() {
    }

    public function rewriteCmsUrl($observer) {
        $condition = $observer->getCondition();
        if ($condition->getIdentifier() == 'home') {
            $condition->setRedirectUrl(Mage::getBaseUrl());
        }
    }

    public function setDynamicHelper($observer) {
        if (Mage::getVersion() < '1.4.0' && Mage::getStoreConfig('payment/ccsave/active')) {
            Mage::getConfig()->setNode('global/helpers/payment/rewrite/data',
                'Peter_Week1_Helper_Payment');
        }
    }
}

