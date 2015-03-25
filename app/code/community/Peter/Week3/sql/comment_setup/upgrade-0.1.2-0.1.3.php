<?php
$installer = $this;
 
$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('week3/comment'),
        'created_at',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'nullable' => true,
            'default' => null,
            'comment' => 'Created At'
        )
    );

$installer->getConnection()
    ->addColumn($installer->getTable('week3/comment'),
        'updated_at',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_DATETIME,
            'nullable' => true,
            'default' => null,
            'comment' => 'Updated At'
        )
    );

$installer->endSetup();

