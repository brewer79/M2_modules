<?php
namespace Speroteck\RequestCatalog\Controller\Adminhtml\Request;

use Magento\Backend\App\Action;
use Speroteck\RequestCatalog\Model\Request as Request;

class Add extends Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $requestData = $this->getRequest()->getParam('request');
        if(is_array($requestData)) {
            $request = $this->_objectManager->create(Request::class);
            $request->setData($requestData)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            $this->messageManager->addSuccessMessage(__('Your request has been saved!'));
            return $resultRedirect->setPath('*/*/index');
        }
    }
}