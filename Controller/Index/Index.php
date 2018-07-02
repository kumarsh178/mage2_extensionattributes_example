<?php
namespace Jeff\AttributeExample\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;
    protected $foomanFactory;
    protected $foomanCollectionFactory;
    protected $orderRepositoryFactory;
    protected $orderRepository;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Jeff\AttributeExample\Model\FoomanFactory $foomanFactory,
        \Jeff\AttributeExample\Model\ResourceModel\Fooman\CollectionFactory $foomanCollectionFactory,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->foomanFactory = $foomanFactory;
        $this->foomanCollectionFactory = $foomanCollectionFactory;
        $this->orderRepository = $orderRepository;
        parent::__construct($context);
    }
    
    public function execute()
    {
        $id = 1;
        $order = $this->orderRepository->get($id);
        
        echo $order->getData('customer_email');
        echo '<br/> '. $order->getData('grand_total') . '<br />';

        $extensionAttributes = $order->getExtensionAttributes();
        //$orderExtension = $extensionAttributes ? $extensionAttributes
        //save extension_attribute for order #1
        $order = $this->orderRepository->get(5);
        $order_id = $order->getData('entity_id');
        $value = 'order'. $order_id . ' additional value.';
        $fooman = $this->foomanFactory->create();
        $fooman->setData('value', $value);
        $fooman->setData('order_id', $order_id);
        $fooman->save();
        $extensionAttributes->setFoomanAttribute($fooman);
        

        //get extension_attribute for order #5
        $foomanAttribute = $extensionAttributes->getFoomanAttribute();
        $result = $foomanAttribute->getData('value');
        var_dump($result);
        //$result = $result[0];
        //print($result['value']);

       // echo 'fooman list:';

        /*
        $collection = $this->foomanCollectionFactory->create();

        foreach($collection as $item) {
            echo $item->getData('value'). '<br />'; 
        }
        */
    }
}
