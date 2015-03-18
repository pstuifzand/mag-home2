<?php

require_once 'Mage/Cms/controllers/IndexController.php';

class Peter_Week1_Cms_IndexController extends Mage_Cms_IndexController {
    public function indexAction($coreRoute = null) {
        $this->getResponse()->setBody($this->getFullActionName());
    }
}
