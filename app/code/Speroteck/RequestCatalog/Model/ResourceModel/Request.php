<?php
namespace Speroteck\RequestCatalog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class Request extends AbstractDb
{

//    public function __construct(
//        \Magento\Framework\Model\ResourceModel\Db\Context $context
//    )
//    {
//        parent::__construct($context);
//    }

    protected function _construct()
    {
        $this->_init('speroteck_requestcatalog_request', 'request_id');
    }

}