<?php

namespace code\Smart\Magerun\Setup;

/**
 * Class InstallData
 * @package code\Smart\Magerun\Setup
 */
class InstallData
{
    protected $itemsFactory;

    public function __construct(
        \Smart\Magerun\Model\MagerunFactory $itemsFactory
    )
    {
        $this->itemsFactory = $itemsFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            [
                'title' => 'Git status',
                'command' => 'git status',
                'option' => '',
                'describe' => 'Check git status',
                'running_at' => '',
                'status' => 1,
            ],
            [
                'title' => 'Git pull',
                'command' => 'git pull',
                'option' => '',
                'describe' => 'Pull latest code',
                'running_at' => '',
                'status' => 1,
            ],
            [
                'title' => 'Clear cache',
                'command' => 'php bin/magento cache:clean',
                'option' => '',
                'describe' => 'Clear cache',
                'running_at' => '',
                'status' => 1,
            ],
            [
                'title' => 'Upgrade schema',
                'command' => 'php bin/magento setup:upgrade',
                'option' => '',
                'describe' => 'Setup upgrade schema',
                'running_at' => '',
                'status' => 1,
            ],
            [
                'title' => 'Compile less',
                'command' => 'grunt less:',
                'option' => '',
                'describe' => 'Compile less to css',
                'running_at' => '',
                'status' => 1,
            ],
            [
                'title' => 'Clear complete cache',
                'command' => 'rm -rf var',
                'option' => '',
                'describe' => 'Clear complete cache in var folder',
                'running_at' => '',
                'status' => 1,
            ],
        ];

        $item = $this->itemsFactory->create();

        $item->addData($data)->save();
    }
}