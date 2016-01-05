<?php

class Peter_Totals_Block_Sales_Order_Totals_Paymentdiscount
    extends Mage_Core_Block_Abstract
{
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }
 
    /**
     * Add this total to parent
     */
    public function initTotals()
    {
        if ((float)$this->getSource()->getPaymentDiscountAmount() == 0) {
            return $this;
        }
        $total = new Varien_Object(array(
            'code'  => 'payment_discount',
            'field' => 'payment_discount_amount',
            'value' => $this->getSource()->getPaymentDiscountAmount(),
            'label' => $this->__('Betalingskorting 5%')
        ));
        $this->getParentBlock()->addTotal($total, 'grand_total');
        return $this;
    }
}
