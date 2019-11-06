<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mastering\SampleModule\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class InsertItemSampleData implements
    DataPatchInterface
{
    /**
     * Constants for table and column name
     */
    const TABLE_NAME = 'mastering_sample_item';
    const COLUMN_ITEM_NAME = 'name';
    const COLUMN_ITEM_DESCRIPTION = 'description';
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        $connection = $this->moduleDataSetup->getConnection();
        $connection->startSetup();

        if ($this->moduleDataSetup->tableExists(self::TABLE_NAME) === true
            && $connection->tableColumnExists(self::TABLE_NAME, self::COLUMN_ITEM_NAME) === true
                && $connection->tableColumnExists(self::TABLE_NAME, self::COLUMN_ITEM_DESCRIPTION) === true
        ) {
            $data = $this->getDataToAdd();
            $connection->insertMultiple(self::TABLE_NAME, $data);
        }
        $connection->endSetup();
    }

    private function getDataToAdd()
    {
        return [
            [
                self::COLUMN_ITEM_NAME => 'Item 1',
                self::COLUMN_ITEM_DESCRIPTION => 'Description 1'
            ],
            [
                self::COLUMN_ITEM_NAME => 'Item 2',
                self::COLUMN_ITEM_DESCRIPTION => 'Description 2'

            ],
            [
                self::COLUMN_ITEM_NAME => 'Item 3',
                self::COLUMN_ITEM_DESCRIPTION => 'Description 3'

            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [

        ];
    }
}
