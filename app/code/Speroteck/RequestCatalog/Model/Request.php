<?php
namespace Speroteck\RequestCatalog\Model;

use Magento\Framework\Model\AbstractModel;

class Request extends AbstractModel
{

//    const CACHE_TAG = 'speroteck_requestcatalog_request';
//
//    protected $_eventObject = 'speroteck_requestcatalog_request';
//
//    protected $_eventPrefix = 'speroteck_requestcatalog_request';
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    )
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init('Speroteck\RequestCatalog\Model\ResourceModel\Request');
    }

//    public function getIdentities()
//    {
//        return [self::CACHE_TAG . '_' . $this->getId()];
//    }
//
//    public function getDefaultValues()
//    {
//        $values = [];
//
//        return $values;
//    }

}