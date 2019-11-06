<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 26/10/19
 * Time: 10:16 PM
 */

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var PageFactory $pageFactory
     */
    private $pageFactory;

    /**
     * Index constructor.
     * @param PageFactory $pageFactory
     * @param Action\Context $context
     */
    public function __construct(
        PageFactory $pageFactory,
        Action\Context $context
    ) {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Mastering_SampleModule::master')
            ->addBreadcrumb(__('Items'), __('Items'))
            ->getConfig()->getTitle()->prepend(__('All Items'));
        return $resultPage;
    }
}
