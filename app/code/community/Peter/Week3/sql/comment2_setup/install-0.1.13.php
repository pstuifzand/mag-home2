<?php

$installer = $this;
$installer->startSetup();
 
/*
 * Create all entity tables
 */
$installer->createEntityTables(
    $this->getTable('week3/comment2_entity')
);
 
/*
 * Add Entity type
 */
$installer->addEntityType('week3_comment2',Array(
    'entity_model'          =>'week3/comment2',
    'attribute_model'       =>'',
    'table'                 =>'week3/comment2_entity',
    'increment_model'       =>'',
    'increment_per_store'   =>'0'
));
 
$installer->installEntities();
 
$installer->endSetup();

