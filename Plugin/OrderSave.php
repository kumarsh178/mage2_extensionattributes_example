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
        \Magento\Sales\Api\Data\OrderInterface $resultOrder
    ) {
        $resultOrder = $this->saveFoomanAttribute($resultOrder);

        return $resultOrder;
    }

    private function saveFoomanAttribute(\Magento\Sales\Api\Data\OrderInterface $order)
    {
        $extensionAttributes = $order->getExtensionAttributes();

        var_dump($extensionAttributes->getFoomanAttribute());
        if(null !== $extensionAttributes && null !== $extensionAttributes->getFoomanAttribute())
        {
            $foomanAttributeValue = $extensionAttributes->getFoomanAttribute()->getValue();
            $foomanAttributeValue = '123';//json_encode($foomanAttributeValue) . '-1';
            try{
                $fooman = $this->foomanFactory->create();
                $fooman->setData('order_id', $order->getEntityId());
                $fooman->setData('value', $foomanAttributeValue);
                $fooman->save();
            }
            catch(\Exception $e)
            {
               
            }
        }

        return $order;
    }
}
