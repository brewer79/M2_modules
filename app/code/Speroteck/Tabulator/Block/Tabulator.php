<?php

namespace Speroteck\Tabulator\Block;

use Magento\Framework\View\Element\Template;

class Tabulator extends Template
{
    const TABS_BLOCK_NAME = 'product.info.details';

    const TABS_GROUP_NAME = 'detailed_info';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('Speroteck_Tabulator::requestcatalog.phtml');
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if ($this->isAllowedTab()) {
            $this->addToTabs();
        }
        $this->setTitle('Custom title here');
    }

    public function addToTabs()
    {
        $this->addToBlock(self::TABS_BLOCK_NAME);
        $this->getLayout()->addToParentGroup($this->getNameInLayout(), self::TABS_GROUP_NAME);
    }

    protected function addToBlock($blockName)
    {
        if ($this->getLayout()->isBlock($blockName) || $this->getLayout()->isContainer($blockName) ) {
            $selfBlockName = $this->getNameInLayout();
            $this->getLayout()->setChild($blockName, $selfBlockName, 'tabulator');
            $this->getLayout()->reorderChild($blockName, $selfBlockName, '-', '');
        }
    }

    /**
     * Get product that is being edited
     *
     * @return \Magento\Catalog\Model\Product
     */
    public function getProduct()
    {
        return $this->coreRegistry->registry('product');
    }

    public function isAllowedTab()
    {
        $current_product = $this->getProduct();
        /**
         * Set your attribute code here
         * Ex. weight
         * $current_product->getWeight()
         */
//        if ($current_product->getShortDescription()) {
//            return true;
//        }
        return false;
    }

    public function getCustomTabData()
    {
        /**
         * Set your attribute code here
         * Ex. weight
         * $current_product->getWeight()
         */
        $current_product = $this->getProduct();
        //return $current_product->getShortDescription();
    }
}