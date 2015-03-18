<?php

class Peter_Week1_Helper_Payment extends Mage_Payment_Helper_Data {
    public function __construct() {
        Mage::log('enabled');
    }
}

