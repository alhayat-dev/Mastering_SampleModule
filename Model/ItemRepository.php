<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 19/10/19
 * Time: 1:20 AM
 */

namespace Mastering\SampleModule\Model;

use Magento\Framework\DataObject;
use Mastering\SampleModule\Api\Data\ItemInterface;
use Mastering\SampleModule\Api\ItemRepositoryInterface;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements ItemRepositoryInterface
{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param int $id
     * @return ItemInterface
     */
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    /**
     * @param ItemInterface $item
     * @return ItemInterface
     */
    public function save(ItemInterface $item)
    {
        // TODO: Implement save() method.
    }

    /**
     * @param ItemInterface $item
     * @return void
     */
    public function delete(ItemInterface $item)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return DataObject[]
     */
    public function getList()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getItems();
    }
}
