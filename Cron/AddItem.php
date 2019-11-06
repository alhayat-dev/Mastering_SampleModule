<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 19/10/19
 * Time: 7:19 PM
 */

namespace Mastering\SampleModule\Cron;

use Magento\Framework\Stdlib\DateTime\DateTime;
use Mastering\SampleModule\Helper\Data\Config;
use Mastering\SampleModule\Model\ItemFactory;
use Mastering\SampleModule\Model\ResourceModel\Item as ItemResourceModel;

class AddItem
{
    /**
     * @var ItemFactory $itemFactory
     */
    private $itemFactory;

    /**
     * @var ItemResourceModel $itemResourceModel
     */
    private $itemResourceModel;

    /**
     * @var DateTime $dateTime
     */
    private $dateTime;

    /**
     * @var Config $config
     */
    private $config;

    /**
     * AddItem constructor.
     * @param Config $config
     * @param DateTime $dateTime
     * @param ItemResourceModel $itemResourceModel
     * @param ItemFactory $itemFactory
     */
    public function __construct(
        Config $config,
        DateTime $dateTime,
        ItemResourceModel $itemResourceModel,
        ItemFactory $itemFactory
    ) {
        $this->config = $config;
        $this->dateTime = $dateTime;
        $this->itemResourceModel = $itemResourceModel;
        $this->itemFactory = $itemFactory;
    }

    public function execute()
    {
        if ($this->config->isEnabled()) {
            $item = $this->itemFactory->create();
            $item->setName('Scheduled Item');
            $item->setDescription("Created at " . $this->dateTime->gmtDate('Y-m-d H:i:s', $this->dateTime->gmtTimestamp()));
            $this->itemResourceModel->save($item);
        }
    }
}
