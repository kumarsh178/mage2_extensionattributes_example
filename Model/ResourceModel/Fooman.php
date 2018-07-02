<?php
namespace Jeff\AttributeExample\Model\ResourceModel;
class Fooman extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('jeff_attributeexample_fooman','jeff_attributeexample_fooman_id');
    }
}
