<?php
namespace Speroteck\RequestCatalog\Controller\Adminhtml\Request;

use Magento\Backend\App\Action;
use Speroteck\RequestCatalog\Model\Request;

class MassDelete extends Action
{
    public function execute()
    {
        $ids = $this->getRequest()->getParam('selected', []);
        if (!is_array($ids) || !count($ids)) {
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }
        foreach ($ids as $id) {
            if ($request = $this->_objectManager->create(Request::class)->load($id)) {
                $request->delete();
            }
        }
        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', count($ids)));

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}