<?php
include_once 'app/Mage.php';
Mage::app('admin');

$fp = fopen('koppeling/csv/import.csv', 'r');

$header = fgetcsv($fp);
while ($row = fgetcsv($fp)) {
    $data = array_combine($header, $row);

    $coupon = Mage::getModel('salesrule/rule');
    $coupon->setName($data['Name']);
    $coupon->setDescription($data['Description']);
    $coupon->setUsesPerCustomer(1);
    $coupon->setUsesPerCoupon(1);
    $coupon->setDiscountQty($data['MaxQty']);
    $coupon->setCouponCode($data['Code']);
    $coupon->setCustomerGroup('General');
    $coupon->setCouponType(Mage_SalesRule_Model_Rule::COUPON_TYPE_SPECIFIC);
    $coupon->save();
}

fclose($fp);
