<?php
namespace Speroteck\RequestCatalog\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Request extends Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_request';
        $this->_blockGroup = 'Speroteck_RequestCatalog';
        $this->_headerText = __('Manage Requests');
        $this->_addButtonLabel = __('Add Request');
        parent::_construct();
    }
}