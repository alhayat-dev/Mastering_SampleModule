<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 19/10/19
 * Time: 1:39 AM
 */

namespace Mastering\SampleModule\Block;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Template;
use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class Post extends Template
{
    /**
     * @var CollectionFactory $collectionFactory
     */
    private $collectionFactory;

    /**
     * Post constructor.
     * @param CollectionFactory $collectionFactory
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        Template\Context $context,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return DataObject[]
     */
    public function getItems()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
