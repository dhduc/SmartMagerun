<?php
namespace Smart\Magerun\Controller\Adminhtml\MagerunGrid;

class Delete extends \Smart\Magerun\Controller\Adminhtml\AbstractAction
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        try {
            $banner = $this->_objectManager->get('Smart\Magerun\Model\Magerun')->load($id);
            $banner->delete();
            $this->messageManager->addSuccessMessage(
                __('Successfully Deleted!')
            );
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        $this->_redirect('*/*/');
    }
}
