<?php
namespace Speroteck\SaleRecommendation\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Custom order column
     */
    const SALE_RECOMMENDATION_FIELD = 'sale_recommendation';

    /**
     * @inheritdoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order'),
            self::SALE_RECOMMENDATION_FIELD,
            [
                'type' => Table::TYPE_TEXT,
                'size' => 255,
                'nullable' => true,
                'comment' => 'Sale Recommendation'
            ]
        );
        $setup->getConnection()->addColumn(
            $setup->getTable('quote'),
            self::SALE_RECOMMENDATION_FIELD,
            [
                'type' => Table::TYPE_TEXT,
                'size' => 255,
                'nullable' => true,
                'comment' => 'Sale Recommendation'
            ]
        );
        $setup->endSetup();
    }
}