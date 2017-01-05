<?php
namespace Smart\Magerun\Controller\Adminhtml\MagerunGrid;

class Index extends \Smart\Magerun\Controller\Adminhtml\AbstractAction
{
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Smart_Magerun::smart_magerungrid_main');

        $resultPage->getConfig()->getTitle()->prepend(__('Magerun Commands'));
        return $resultPage;
    }
}
