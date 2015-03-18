<?php
class Peter_Week3_Block_Html_Breadcrumbs extends Mage_Page_Block_Html_Breadcrumbs {

    public function __construct() {
        parent::__construct();
        $this->addCrumb('peter_week3', array(
            'label' => 'Week3',
            'link' => Mage::getUrl('week3'),
        ));
    }
}


