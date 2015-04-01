<?php

$installer = $this;

/* @var $installer Mage_Catalog_Model_Entity_Setup */
$installer->startSetup();

$installer->addAttribute('customer', 'customer_type', array(
    'group'     => 'Account Information',
    'label'     => 'Customer type',
    'visible'   => true,
    'required'  => false,
    'type'      => 'varchar',
    'input'     => 'multiselect',
    'source'    => 'week3/entity_attribute_source_multi',
    'backend'   => 'week3/entity_attribute_backend_multi',
    'user_defined' => true,
));

$installer->endSetup();

