<?php

namespace Speroteck\Helloworld\Block;

use Magento\Framework\View\Element\Template;

class Helloworld extends Template
{
    /**
    * @param Template\Context $context
    * @param array $layoutProcessors
    * @param array $data
    */
    protected $layoutProcessors;

    public function __construct(
        Template\Context $context,
        array $layoutProcessors = [],
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
        $this->layoutProcessors = $layoutProcessors;
    }

   /**
   * @return string
   */
    public function getJsLayout()
    {
        foreach ($this->layoutProcessors as $processor) {
            $this->jsLayout = $processor->process($this->jsLayout);
        }
        //return \Zend_Json::encode($this->jsLayout);
        return parent::getJsLayout();
    }
}