<?php
namespace Smart\Magerun\Controller\Adminhtml\MagerunGrid;

class Edit extends \Smart\Magerun\Controller\Adminhtml\AbstractAction
{
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');

        $model = $this->_objectManager->create('Smart\Magerun\Model\Magerun');

        $registryObject = $this->_objectManager->get('Magento\Framework\Registry');

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This row no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
        // 3. Set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $registryObject->register('magerun_magerun', $model);
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
