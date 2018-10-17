<?php
namespace Jeff\AttributeExample\Block;
class Main extends \Magento\Framework\View\Element\Template
{
    function _prepareLayout(){}

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Jeff\AttributeExample\Factory\ViewModelFactory $viewModelFactory,
        array $data = []
    ) {
        $this->viewModelFactory = $viewModelFactory;
        parent::__construct($context, $data);
    }

    public function getViewModel()
    {
        return $this->viewModelFactory->create($this);
    }
}
