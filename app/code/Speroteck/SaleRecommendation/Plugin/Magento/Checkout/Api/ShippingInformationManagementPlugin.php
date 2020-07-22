<?php

namespace Speroteck\SaleRecommendation\Plugin\Magento\Checkout\Api;

use Magento\Checkout\Api\ShippingInformationManagementInterface as Subject;
use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Magento\Quote\Model\QuoteRepository;

class ShippingInformationManagementPlugin
{
    protected $quoteRepository;

    /**
     * @param \Magento\Quote\Model\QuoteRepository $quoteRepository
     */
    public function __construct(QuoteRepository $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     */
    public function beforeSaveAddressInformation(Subject $subject, $cartId, ShippingInformationInterface $addressInformation)
    {
        if ($extensionAttributes = $addressInformation->getExtensionAttributes()) {
            if ($saleRecommendation = $extensionAttributes->getSaleRecommendation()) {
                /** @var \Magento\Quote\Model\Quote $quote */
                $quote = $this->quoteRepository->getActive($cartId);
                $quote->setData('sale_recommendation', $saleRecommendation);
            }

        }
        return [$cartId, $addressInformation];
    }
}
