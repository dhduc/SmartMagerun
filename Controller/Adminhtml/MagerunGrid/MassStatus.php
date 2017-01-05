<?php
namespace Smart\MagerunGrid\Controller\Adminhtml\MagerunGrid;

class MassStatus extends \Smart\Magerun\Controller\Adminhtml\AbstractAction
{
    public function execute()
    {
        $ids = $this->getRequest()->getParam('id');
        $status = $this->getRequest()->getParam('status');
        if (!is_array($ids) || empty($ids)) {
            $this->messageManager->addErrorMessage(__('Please select product(s).'));
        } else {
            try {
                foreach ($ids as $id) {
                    $row = $this->_objectManager->get('Smart\Firstgrid\Model\Magerun')->load($id);
                    $row->setData('status', $status)
                        ->save();
                }
                $this->messageManager->addSuccessMessage(
                    __('A total of %1 record(s) have been deleted.', count($ids))
                );
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }
        $this->_redirect('*/*/');
    }
}
