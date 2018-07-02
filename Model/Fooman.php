<?php
namespace Jeff\AttributeExample\Model;
class Fooman extends \Magento\Framework\Model\AbstractModel implements \Jeff\AttributeExample\Api\Data\FoomanInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'jeff_attributeexample_fooman';

    protected function _construct()
    {
        $this->_init('Jeff\AttributeExample\Model\ResourceModel\Fooman');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        return $this->setData(self::VALUE, $value);
    }
}
