<?php
class Peter_Week3_Model_Sales_Quote_Address_Total_Discount extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function __construct()
    {
        $this->setCode('discount');
    }

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);

        foreach ($this->_getAddressItems($address) as $item) {
            $baseAmt = 0;
            $amt     = 0;

            if ($address->getCountry() == 'NL') {
                $baseAmt = -5;
                $amt = -5;
            }

            $item->setBaseDiscountAmount($baseAmt);
            $item->setDiscountAmount($amt);

            $this->_addBaseAmount($baseAmt);
            $this->_addAmount($amt);
        }
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        // Naturally, this exists on the quote address because "collect" ran already
        $amt = $address->getDiscountAmount();
        
        if ($amt != 0) {
            $address->addTotal(array(
                    'code' => $this->getCode(),
                    'title' => Mage::helper('peter_week3')->__('My discount'),
                    'value' => $amt
            ));
        }

        return $this;
    }
}
