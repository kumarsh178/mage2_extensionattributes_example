<?php
namespace Jeff\AttributeExample\Factory;

class ViewModelFactory
{
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager) 
    {
        $this->objectManager = $objectManager;
    }

    public function create($block)
    {
        $viewModelClass = str_replace('\Block\\', '\ViewModel\\', get_class($block));

        if(class_exists($viewModelClass)) {
            return $this->objectManager->create($className);
        }
    }
}
