<?php
class Peter_HelloWorld_IndexController extends Mage_Core_Controller_Front_Action {
    function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }
}
?>
