<?php

namespace Speroteck\RequestCatalog\Block;

use Magento\Framework\View\Element\Template;

class RequestCatalog extends Template
{
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }

    /**
     * Get form action URL for POST booking request
     *
     * @return string
     */
    public function getFormAction()
    {

        return $this->getUrl('requestcatalog/index/post', ['_secure' => true]);
    }
}