<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 26/10/19
 * Time: 11:30 PM
 */

namespace Mastering\SampleModule\Controller\Adminhtml\Item;


use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Mastering\SampleModule\Model\Item;

class Edit extends Action
{
    /**
     * @var PageFactory $resultPageFactory
     */
    private $resultPageFactory;

    /**
     * @var Registry $coreRegistry
     */
    private $coreRegistry;

    /**
     * Edit constructor.
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param Action\Context $context
     */
    public function __construct(
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        Action\Context $context
    ) {
        $this->coreRegistry = $coreRegistry;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * SHORT DESCRIPTION
     * LONG DESCRIPTION LINE BY LINE
     * @return Page|Redirect|ResponseInterface|ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(Item::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This item no longer exists.'));
                /** @var Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->coreRegistry->register('mastering_item', $model);

        // 3. Build edit form
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mastering_SampleModule::master')
            ->addBreadcrumb(__('Mastering'), __('Mastering'))
            ->addBreadcrumb(__('All Items'), __('All Items'))
            ->addBreadcrumb(
                $id ? __('Edit Item') : __('New Item'),
                $id ? __('Edit Item') : __('New Item')
            );
        $resultPage->getConfig()->getTitle()->prepend(__('All Items'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getName() : __('New Item'));
        return $resultPage;
    }

    /**
     * SHORT DESCRIPTION
     * LONG DESCRIPTION LINE BY LINE
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mastering_SampleModule::master');
    }
}
