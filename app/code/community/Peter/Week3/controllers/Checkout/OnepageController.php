<?php

require_once 'app/code/core/Mage/Checkout/controllers/OnepageController.php';

class Peter_Week3_Checkout_OnepageController extends Mage_Checkout_OnepageController
{
    public function saveBillingAction()
    {
        if ($this->_expireAjax()) {
            return;
        }
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost('billing', array());
            $customerAddressId = $this->getRequest()->getPost('billing_address_id', false);

            if (isset($data['email'])) {
                $data['email'] = trim($data['email']);
            }
            $result = $this->getOnepage()->saveBilling($data, $customerAddressId);

            if (!isset($result['error'])) {
                if ($this->getOnepage()->getQuote()->isVirtual()) {
                    $result['goto_section'] = 'payment';
                    $result['update_section'] = array(
                        'name' => 'payment-method',
                        'html' => $this->_getPaymentMethodsHtml()
                    );
                } elseif (isset($data['use_for_shipping']) && $data['use_for_shipping'] == 1) {
                    $address = $this->getOnepage()->getQuote()->getShippingAddress();
                    $groups = $address->getGroupedAllShippingRates();

                    $keys = array_keys($groups);

                    if (count($keys) == 1 && count($groups[$keys[0]]) == 1) {
                        $r = $groups[$keys[0]][0];
                        $this->getOnepage()->saveShippingMethod($r->getCode());
                        $this->getOnepage()->getQuote()->collectTotals()->save();

                        $result['goto_section'] = 'payment';
                        $result['update_section'] = array(
                            'name' => 'payment-method',
                            'html' => $this->_getPaymentMethodsHtml()
                        );
                        $result['allow_sections'] = array('shipping');
                        $result['duplicateBillingInfo'] = 'true';
                    }
                    else {
                        $result['goto_section'] = 'shipping_method';
                        $result['update_section'] = array(
                            'name' => 'shipping-method',
                            'html' => $this->_getShippingMethodsHtml()
                        );

                        $result['allow_sections'] = array('shipping');
                        $result['duplicateBillingInfo'] = 'true';
                    }
                } else {
                    $result['goto_section'] = 'shipping';
                }
            }

            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
        }
    }
}
