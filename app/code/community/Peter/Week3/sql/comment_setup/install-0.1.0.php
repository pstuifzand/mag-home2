<?php
$installer = $this;
 
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('week3/comment'))
    ->addColumn('comment_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Id')
    ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ), 'Comment');
$installer->getConnection()->createTable($table);

$installer->endSetup();

