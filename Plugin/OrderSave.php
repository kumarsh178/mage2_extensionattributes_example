<?php
namespace Jeff\AttributeExample\Plugin;

use Magento\Framework\Exception\CouldNotSaveException;

class OrderSave
{
    protected $foomanFactory;

    public function __construct(
        \Jeff\AttributeExample\Model\FoomanFactory $foomanFactory
    ) 
    {
        $this->foomanFactory = $foomanFactory;
    }

    public function afterSave(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        \Magento\Sales\Api\Data\OrderInterfacee $resultOrder
    ) {
        $resultOrder = $this->saveFoomanAttribute($resultOrder);

        return $resultOrder;
    }

    private function saveFoomanAttribute(\Magento\Sales\Api\Data\OrderInterface $order)
    {
        $extensionAttribute = $order->getExtensionAttributes();

        if(null !== $extensionAttributes && null !== $extensionAttributes->getFoomanAttribute())
        {
            $foomanAttributeValue = $extensionAttributes->getFoomanAttribute()->getValue();
            try{
                $fooman = $this->foomanFactory->create();
                $fooman->setData('order_id', $order->getEntityId());
                $fooman->setData('value', $foomanAttributeValue);
            }
            catch(\Exception $e)
            {
               
            }
        }

        return $order;
    }
}
