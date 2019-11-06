<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 19/10/19
 * Time: 12:59 AM
 */

namespace Mastering\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;
use Mastering\SampleModule\Api\Data\ItemInterface;

class Item extends AbstractModel implements ItemInterface
{
    protected $_eventPrefix = 'mastering_sample_item';

    protected function _construct()
    {
        $this->_init(\Mastering\SampleModule\Model\ResourceModel\Item::class);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_getData(self::COLUMN_ITEM_NAME);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_getData(self::COLUMN_ITEM_DESCRIPTION);
    }

    /**
     * @param $name
     * @return string
     */
    public function setName($name)
    {
        $this->setData(self::COLUMN_ITEM_NAME, $name);
    }

    /**
     * @param $description
     * @return string
     */
    public function setDescription($description)
    {
        $this->setData(self::COLUMN_ITEM_DESCRIPTION, $description);
    }
}
