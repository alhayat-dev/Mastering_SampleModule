<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 19/10/19
 * Time: 11:25 PM
 */

namespace Mastering\SampleModule\Model;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;

class DebugHandler extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/custom_debug.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}

