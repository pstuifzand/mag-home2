<?php

class Peter_Week3_Model_Resource_Setup extends Mage_Eav_Model_Entity_Setup {
    public function getDefaultEntities() {
        $entities = array(
            'peter_week3_comment2' => array(
                'entity_model' => 'peter_week3/comment2',
                'attribute_model' => '',
                'table' => 'peter_week3/comment2_entity',
                'attributes' => array(
                    'message' => array(
                        'type' => 'varchar',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Message',
                        'input' => 'text',
                        'class' => '',
                        'source' => '',
                        'global' => 0,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => true,
                        'unique' => false,
                    ),
                    'product_id' => array(
                        'type' => 'int',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Product Id',
                        'input' => 'int',
                        'class' => '',
                        'source' => '',
                        'global' => 0,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => true,
                        'unique' => false,
                    ),
                ),
            )
        );
        return $entities;
    }
}
