<?php
namespace Smart\Magerun\Controller\Adminhtml\MagerunGrid;

class NewAction extends \Smart\Magerun\Controller\Adminhtml\AbstractAction
{
    public function execute()
    {
        $this->_forward('edit');
    }
}
