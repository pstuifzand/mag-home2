<?php

class Peter_Totals_Model_Sales_Order_Invoice_Total_Paymentdiscount extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $paymentDiscountAmt = $invoice->getOrder()->getPaymentDiscountAmount();
        $basePaymentDiscountAmt = $invoice->getOrder()->getBasePaymentDiscountAmount();

        $invoice->setPaymentDiscountAmount($paymentDiscountAmt);
        $invoice->setBasePaymentDiscountAmount($basePaymentDiscountAmt);

        $invoice->setGrandTotal($invoice->getGrandTotal()+$paymentDiscountAmt);
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal()+$basePaymentDiscountAmt);

        return $this;
    }
}

