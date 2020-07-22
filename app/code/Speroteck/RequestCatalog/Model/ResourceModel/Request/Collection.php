<?php
namespace Speroteck\RequestCatalog\Model\ResourceModel\Request;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

//    protected $_idFieldName = 'request_id';
//    protected $_eventPrefix = 'speroteck_requestcatalog_request_collection';
//    protected $_eventObject = 'request_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Speroteck\RequestCatalog\Model\Request', 'Speroteck\RequestCatalog\Model\ResourceModel\Request');
    }

}