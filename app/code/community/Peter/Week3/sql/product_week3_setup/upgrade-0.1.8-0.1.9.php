<?php

$installer = $this;

/* @var $installer Mage_Catalog_Model_Entity_Setup */
$installer->startSetup();

$installer->addAttribute('catalog_product', 'delivery_time', array(
    'label'     => 'Delivery time',
    'visible'   => true,
    'required'  => false,
    'type'      => 'int',
    'input'     => 'select',
    'source'    => 'eav/entity_attribute_source_table',
));

$attributeId = (int)$installer->getAttribute('catalog_product', 'delivery_time', 'attribute_id');

$options = array('Direct leverbaar', '2-3 werkdagen', '4-5 werkdagen', '1 week', '2 weken', '3 weken');

$setup = new Mage_Eav_Model_Entity_Setup('product_week3_setup');

$setup->addAttributeOption(array('attribute_id' => $attributeId, 'values' => $options));

$installer->endSetup();

