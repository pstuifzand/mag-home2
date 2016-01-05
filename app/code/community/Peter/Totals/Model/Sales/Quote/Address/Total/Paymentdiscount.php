<?php

class Peter_Totals_Model_Sales_Quote_Address_Total_Paymentdiscount extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function __construct()
    {
        $this->setCode('payment_discount');
    }

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);

        $subtotal = 0;
        foreach ($this->_getAddressItems($address) as $item) {
            $subtotal += $item->getRowTotal();
        }
        $amt = $subtotal * 0.05;

        $this->_addBaseAmount(-$amt);
        $this->_addAmount(-$amt);

        return $this;
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        // Naturally, this exists on the quote address because "collect" ran already
        $amt = $address->getPaymentDiscountAmount();
        
        if ($amt != 0) {
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => Mage::helper('peter_totals')->__('Betalingskorting 5%'),
                'value' => $amt,
            ));
        }

        return $this;
    }
}
