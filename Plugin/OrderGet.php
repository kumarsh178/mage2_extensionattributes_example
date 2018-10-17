<?php
namespace Jeff\AttributeExample\Plugin;

use Magento\Framework\Exception\NoSuchEntityException;
class OrderGet 
{
   
    protected $foomanFactory;
    protected $foomanCollectionFactory;
    protected $orderExtensionFactory;
    protected $logger;

    public function __construct(
        \Jeff\AttributeExample\Model\FoomanFactory $foomanFactory,
        \Jeff\AttributeExample\Model\ResourceModel\Fooman\CollectionFactory $foomanCollectionFactory,
        \Magento\Sales\Api\Data\OrderExtensionFactory $orderExtensionFactory,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->foomanFactory = $foomanFactory;
        $this->foomanCollectionFactory = $foomanCollectionFactory;
        $this->orderExtensionFactory = $orderExtensionFactory;
        $this->logger = $logger;
    }

    public function afterGet(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        \Magento\Sales\Api\Data\OrderInterface $resultOrder
    )
    {
        $resultOrder = $this->getFoomanAttribute($resultOrder);
        return $resultOrder;
    }

    private function getFoomanAttribute(\Magento\Sales\Api\Data\OrderInterface $order)
    {
        $extensionAttributes = $order->getExtensionAttributes();

        //$this->logger->info('I am called by plugin. afterGet');

        //if($extensionAttributes && $extensionAttributes->getFoomanAttribute()) {
        //    return $order;
        //}

        try {
            $fooman = $this->foomanCollectionFactory->create()->addFieldToFilter('order_id', array('eq', $order->getEntityId()))->getFirstItem();
            $foomanAttributeValue = $fooman->getData('value');
            echo 'I am called';
            //var_dump($foomanAttributeValue);
        }
        catch(\Exception $e){
            return $order;
        }

        $extensionAttributes = $order->getExtensionAttributes();

        /** @var \Magento\Sales\Api\Data\OrderExtension $orderExtension */
        $orderExtension = $extensionAttributes ? $extensionAttributes : $this->orderExtensionFactory->create();

        $fooman = $this->foomanFactory->create();
        $fooman->setData('value', $foomanAttributeValue);

        $orderExtension->setFoomanAttribute($fooman);
        $order->setExtensionAttributes($orderExtension);

        return $order;
    }
}
