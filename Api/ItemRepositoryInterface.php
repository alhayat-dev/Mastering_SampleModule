<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 19/10/19
 * Time: 1:12 AM
 */

namespace Mastering\SampleModule\Api;

use Magento\Framework\Exception\NoSuchEntityException;
use Mastering\SampleModule\Api\Data\ItemInterface;
use VinaiKopp\Kitchen\Api\Data\HamburgerInterface;

interface ItemRepositoryInterface
{
    /**
     * @param int $id
     * @return ItemInterface
     * @throws NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param ItemInterface $item
     * @return ItemInterface
     */
    public function save(ItemInterface $item);

    /**
     * @param ItemInterface $item
     * @return void
     */
    public function delete(ItemInterface $item);

    /**
     * @return ItemInterface[]
     */
    public function getList();
}
