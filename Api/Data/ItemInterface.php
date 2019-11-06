<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 19/10/19
 * Time: 1:03 AM
 */

namespace Mastering\SampleModule\Api\Data;

interface ItemInterface
{
    /**
     * Constants for table and column name
     */
    const TABLE_NAME = 'mastering_sample_item';
    const COLUMN_ITEM_NAME = 'name';
    const COLUMN_ITEM_DESCRIPTION = 'description';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param $name
     * @return string
     */
    public function setName($name);

    /**
     * @param $description
     * @return string
     */
    public function setDescription($description);

}
