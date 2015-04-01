<?php

$installer = $this;

/* @var $installer Mage_Catalog_Model_Entity_Setup */
$installer->startSetup();

$installer->addAttribute('catalog_product', 'format', array(
    'group'     => 'General',
    'label'     => 'Formaat',
    'visible'   => true,
    'required'  => false,
    'type'      => 'int',
    'input'     => 'select',
    'visible_on_front' => true,
    'visible_in_advanced_search' => true,
    'visible_on_front' => true,
    'searchable' => '1',
    'filterable' => '1',
    'filterable_in_search' => '1',
    'comparable' => '1',
    'used_in_product_listing' => '1',
    'used_for_sort_by'        => '1',
    'source' => 'week3/entity_attribute_source_format',
    'user_defined'=>'1',
));

$installer->endSetup();

