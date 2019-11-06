<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 19/10/19
 * Time: 4:18 PM
 */

namespace Mastering\SampleModule\Console\Command;

use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Mastering\SampleModule\Model\ItemFactory;
use Mastering\SampleModule\Model\ResourceModel\Item as ItemResourceModel;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddItemCommand extends Command
{
    const INPUT_KEY_NAME = "name";
    const INPUT_KEY_DESCRIPTION = "description";

    /**
     * @var ItemFactory $itemFactory
     */
    private $itemFactory;

    /**
     * @var ItemResourceModel $itemResourceModel
     */
    private $itemResourceModel;

    /**
     * @var ManagerInterface $eventManager
     */
    private $eventManager;

    /**
     * @var LoggerInterface $logger
     */
    private $logger;

    /**
     * AddItemCommand constructor.
     * @param ManagerInterface $eventManager
     * @param ItemResourceModel $itemResourceModel
     * @param ItemFactory $itemFactory
     */
    public function __construct(
        LoggerInterface $logger,
        ManagerInterface $eventManager,
        ItemResourceModel $itemResourceModel,
        ItemFactory $itemFactory
    ) {
        $this->logger = $logger;
        $this->eventManager = $eventManager;
        $this->itemResourceModel = $itemResourceModel;
        $this->itemFactory = $itemFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName("mastering:item:add")
            ->addArgument(
                self::INPUT_KEY_NAME,
                InputArgument::REQUIRED,
                'Item name'
                )->addArgument(
                    self::INPUT_KEY_DESCRIPTION,
                InputArgument::OPTIONAL,
                'Item Description'
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     * @throws AlreadyExistsException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(self::INPUT_KEY_NAME));
        $item->setDescription($input->getArgument(self::INPUT_KEY_DESCRIPTION));
        $this->itemResourceModel->save($item);

//        $this->eventManager->dispatch('mastering_command', ['object' => $item]);
//        $this->logger->debug("Item was created.");
    }
}
