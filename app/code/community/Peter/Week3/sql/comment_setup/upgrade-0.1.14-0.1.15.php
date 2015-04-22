<?php

$installer = $this;
 
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('week3/indexer_comment'))
    ->addColumn('comment_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Id');
$installer->getConnection()->createTable($table);

$installer->getConnection()
    ->addColumn($installer->getTable('week3/indexer_comment'),
        'product_id',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
            'nullable' => true,
            'default' => null,
            'comment' => 'Product id'
        )
    );


$installer->endSetup();

