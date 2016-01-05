<?php

$installer = $this;
$installer->startSetup();

$tables = array(
    'sales/quote_item',
    'sales/quote_address_item',
    'sales/quote_address',
    'sales/order_item',
    'sales/order',
    'sales/invoice',
    'sales/creditmemo',
);

foreach ($tables as $table) {
    $installer->getConnection()
        ->addColumn($installer->getTable($table), 
            'base_payment_discount_amount', 
            array(
                'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
                'length' => '12,4',
                'nullable'  => true,
                'comment' => 'Payment Discount',
            )
        );

    $installer->getConnection()
        ->addColumn($installer->getTable($table), 
            'payment_discount_amount', 
            array(
                'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
                'length' => '12,4',
                'nullable'  => true,
                'comment' => 'Payment Discount',
            )
        );
}

$installer->endSetup();
