<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 20/10/19
 * Time: 3:27 PM
 */

namespace Mastering\SampleModule\Plugin;

use Mastering\SampleModule\Console\Command\AddItemCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Logger
{
    /**
     * @var $output
     */
    private $output;

    /**
     * @param AddItemCommand $subject
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function beforeRun(
        AddItemCommand $subject,
        InputInterface $input,
        OutputInterface $output
    ) {
        $output->writeln("beforeExecuted");
    }

    /**
     * @param AddItemCommand $subject
     * @param \Closure $proceed
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function aroundRun(
        AddItemCommand $subject,
        \Closure $proceed,
        InputInterface $input,
        OutputInterface $output
    ) {
        $output->writeln("aroundExecute before call");
        $proceed->call($subject, $input, $output);
        $output->writeln("aroundExecute after call");
        $this->output = $output;
    }

    /**
     * @param AddItemCommand $subject
     * @param $result
     * @param OutputInterface $output
     */
    public function afterRun(
        AddItemCommand $subject,
        $result
    ) {
        $this->output->writeln("afterExecute");
    }
}
