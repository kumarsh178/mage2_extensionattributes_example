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
        //return $this->resultPageFactory->create();
        $order = $this->orderRepository->get(29);

        $order->setShippingAmount(number_format(9.00, 2));
        $order->setBaseShippingAmount(number_format(9.00,2));
        $this->orderRepository->save($order);
        var_dump($order->getData());
    }
}
