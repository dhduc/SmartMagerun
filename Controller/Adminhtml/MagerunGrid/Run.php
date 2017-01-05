<?php
namespace Smart\Magerun\Controller\Adminhtml\MagerunGrid;

/**
 * Class Run
 * @package Smart\Magerun\Controller\Adminhtml\MagerunGrid
 */
class Run extends \Smart\Magerun\Controller\Adminhtml\AbstractAction
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $row = $this->_objectManager->get('Smart\Magerun\Model\Magerun')->load($id);
        $command = $row->getData('command');
        if ($row->getData('options')) {
            $command = $command . ' ' . $row->getData('option');
        }

        try {
            /** Save the latest try time */
            $row->setRunningAt(time())->save();

            $output = shell_exec($command);
            $this->_coreRegistry->register('magerun_output', $output);
            $this->_catalogSession->setData('magerun_output', $output);
            $this->messageManager->addSuccessMessage(
                __('Run command %1 successful', $command)
            );
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        $this->_redirect('*/*/');
    }
}
