<?php
include_once 'app/Mage.php';

Mage::app('admin');

$coupon = Mage::getModel('salesrule/rule');
$coupon->setName('Test coupon - CODE');
$coupon->setDescription('This is a test');
$coupon->setUsesPerCustomer(1);
$coupon->setUsesPerCoupon(1);
$coupon->setCouponCode('CODE');
$coupon->setCustomerGroup('General');
$coupon->setCouponType(Mage_SalesRule_Model_Rule::COUPON_TYPE_SPECIFIC);
$coupon->save();

#$coupon->setExpirationDate(null);
#$coupon->setCreatedAt(null);

