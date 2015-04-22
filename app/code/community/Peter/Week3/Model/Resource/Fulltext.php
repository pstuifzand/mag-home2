<?php

class Peter_Week3_Model_Resource_Fulltext extends Mage_CatalogSearch_Model_Resource_Fulltext {
    protected function _prepareProductIndex($indexData, $productData, $storeId) {
        $index = parent::_prepareProductIndex($indexData, $productData, $storeId);

        $model = Mage::getModel('tag/tag');
        $tags = $model->getResourceCollection()
            ->addPopularity()
            ->addStatusFilter($model->getApprovedStatus())
            ->addProductFilter($productData['entity_id'])
            ->setFlag('relation', true)
            ->addStoreFilter($storeId)
            ->setActiveFilter()
            ->load();

        foreach ($tags as $tag) {
            $index .= $this->_separator . $tag->getName();
        }

        return $index;
    }
}
