<?php

$installer = $this;

/* @var $installer Mage_Catalog_Model_Entity_Setup */
$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('product_week3_setup');

$entityTypeId     = $setup->getEntityTypeId('customer');
$attributeSetId   = $setup->getDefaultAttributeSetId($entityTypeId);
$attributeGroupId = $setup->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);

$attribute   = Mage::getSingleton("eav/config")->getAttribute("customer", "customer_type");


$setup->addAttributeToGroup(
    $entityTypeId,
    $attributeSetId,
    $attributeGroupId,
    'customer_type',
    '999'  //sort_order
);

$used_in_forms=array();

$used_in_forms[] = "adminhtml_customer";
$attribute->setData("used_in_forms", $used_in_forms)
        ->setData("is_used_for_customer_segment", true)
        ->setData("is_system", 0)
        ->setData("is_user_defined", 1)
        ->setData("is_visible", 1)
        ->setData("sort_order", 100)
        ;
$attribute->save();

$installer->endSetup();

$installer->endSetup();

