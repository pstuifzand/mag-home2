<?php

class Peter_Week3_Model_Observer {
    public function saleRuleConditionCombine($observer) {
        $model = Mage::getModel('week3/rule_condition_dayofweek');
        $options = $model->getNewChildSelectOptions();
        $observer->getEvent()->setAdditional($options);
    }

    public function afterProductAdd($observer) {
        $product    = $observer->getProduct();
        $quote_item = $observer->getQuoteItem();

        $cart = Mage::getSingleton('checkout/cart');
    }

    public function beforeUpdateItems($observer) {
        $cart = $observer->getCart();
        $info = $observer->getInfo();
    }

    public function afterUpdateProduct($observer) {
        $quote_item = $observer->getQuoteItem();
        $product = $observer->getProduct();
        $cart = Mage::getSingleton('checkout/cart');
    }

    public function afterUpdateItems($observer) {
        $cart = $observer->getCart();
        $data = $observer->getInfo();

        foreach ($data as $itemId => $itemInfo) {
            $item = $cart->getQuote()->getItemById($itemId);
            if (!$item) {
                continue;
            }

            if ($item->getOptionByCode('free_gift')) {
                $item->setQty(1);
            }
        }
    }

    public function eventAddSalesQuoteItem($observer) {
        $item = $observer->getQuoteItem();

        if ($item->getProductId() == 337) {
            $cart = Mage::getSingleton('checkout/cart');
            $product = Mage::getModel('catalog/product')->load(370);

            $quote_item = Mage::getModel('sales/quote_item');
            $quote_item->setQty(1);
            $quote_item->setCustomPrice(0.00);
            $quote_item->setOriginalCustomPrice(0.00);
            $quote_item->setNoDiscount(false);
            $quote_item->setProduct($product);
            $quote_item->addOption(array('product_id'=>370, 'code' => 'free_gift', 'value' => 1));
            $product->setIsSuperMode(true);
            $cart->getQuote()->addItem($quote_item);
            Mage::getSingleton('core/session')->addSuccess('Je krijgt een gratis product van ons');
        }
    }

    public function eventRemoveSalesQuoteItem($observer) {
        $item = $observer->getQuoteItem();

        if ($item->getProductId() == 337) {
            $cart = Mage::getSingleton('checkout/cart');
            foreach ($cart->getItems() as $item) {
                if ($item->getProductId() == 370 && $item->getOptionByCode('free_gift')) {
                    $cart->removeItem($item->getId());
                }
            }
        }
    }

    public function setSupplierSkuAttribute($observer) {
        $item = $observer->getQuoteItem();
        $product = $observer->getProduct();
        $item->setSupplierSku($product->getSupplierSku());
        return $this;
    }
    public function eventSalesQuoteSaveBefore($observer) {
        $quote = $observer->getQuote();

        if ($quote) {
            $address = $quote->getShippingAddress();
            if ($address) {
                $removeItem = false;
                $country = $address->getCountryId();
                if ($country == 'US') {
                    foreach ($quote->getItemsCollection() as $item) {
                        if ($item->getSupplierSku() == 'SUPMP3') {
                            $removeItem = $item;
                            break;
                        }
                    }
                    if ($removeItem) {
                        $quote->deleteItem($removeItem);
                        $session = Mage::getSingleton('checkout/session');
                        $session->addError(Mage::helper('peter_week3')->__('Product with SKU %s isn\'t sold in the US', $removeItem->getSupplierSku()));
                    }
                }
            }
        }
    }
}
