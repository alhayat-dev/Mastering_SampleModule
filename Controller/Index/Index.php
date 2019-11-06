<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 19/10/19
 * Time: 1:26 AM
 */

namespace Mastering\SampleModule\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Mastering\SampleModule\Model\ItemRepository;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var ItemRepository $itemRepository
     */
    private $itemRepository;

    /**
     * @var PageFactory $pageFactory
     */
    private $pageFactory;

    /**
     * Index constructor.
     * @param PageFactory $pageFactory
     * @param ItemRepository $itemRepository
     * @param Context $context
     */
    public function __construct(
        PageFactory $pageFactory,
        ItemRepository $itemRepository,
        Context $context
    ) {
        $this->pageFactory = $pageFactory;
        $this->itemRepository = $itemRepository;
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
        return $this->pageFactory->create();
//        $posts = $this->itemRepository->getList();
//        foreach ($posts as $post) {
//            echo "<pre>";
//            var_dump($post->getData());
//        }
//        exit();
    }
}
