<?php
namespace Speroteck\RequestCatalog\Controller\Adminhtml\Request;

use Magento\Framework\Controller\ResultFactory;
use Speroteck\RequestCatalog\Model\Request as Request;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $requestData = $this->getRequest()->getParam('request');
        if(is_array($requestData)) {
            $request = $this->_objectManager->create(Request::class);
            $request->setData($requestData)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            $this->messageManager->addSuccessMessage(__('Your request has been saved!'));
            return $resultRedirect->setPath('*/*/index');
        }

        return $resultPage;
    }
}