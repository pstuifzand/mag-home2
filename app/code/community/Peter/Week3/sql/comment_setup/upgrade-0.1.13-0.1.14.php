<?php
$installer = $this;
 
$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('week3/comment'),
        'product_id',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
            'nullable' => true,
            'default' => null,
            'comment' => 'Product id'
        )
    );

$installer->endSetup();

