<?php
namespace Jeff\AttributeExample\Model\ResourceModel\Fooman;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Jeff\AttributeExample\Model\Fooman','Jeff\AttributeExample\Model\ResourceModel\Fooman');
    }
}
