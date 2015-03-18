<?php

require_once 'Mage/Customer/controllers/AccountController.php';

class Peter_Week1_Customer_AccountController extends Mage_Customer_AccountController {
    public function loginAction() {
        $session = Mage::getSingleton('customer/session');
        $session->setBeforeAuthUrl(Mage::getUrl('test.html'));
        parent::loginAction();
    }
}
