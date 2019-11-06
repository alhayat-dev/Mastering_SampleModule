<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 20/10/19
 * Time: 8:26 PM
 */

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Mastering\SampleModule\Model\ItemFactory;

class Save extends Action
{
    /**
     * @var ItemFactory $itemFactory
     */
    private $itemFactory;

    /**
     * @var RedirectFactory $redirectFactory
     */
    private $redirectFactory;

    /**
     * Save constructor.
     * @param RedirectFactory $redirectFactory
     * @param ItemFactory $itemFactory
     * @param Action\Context $context
     */
    public function __construct(
        RedirectFactory $redirectFactory,
        ItemFactory $itemFactory,
        Action\Context $context
    ) {
        $this->redirectFactory = $redirectFactory;
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return Redirect $redirectFactory
     * @throws \Exception
     */
    public function execute()
    {
        $item = $this->itemFactory->create();
        $item->setData($this->getRequest()->getPostValue()['general'])->save();
        $redirectResultFactory = $this->redirectFactory->create();
        return $redirectResultFactory->setPath('mastering/index/index');
    }
}
