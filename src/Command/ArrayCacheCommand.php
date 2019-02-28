<?php
declare(strict_types=1);

/**
 * File:ArrayCacheCommand.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Command;

use LizardMedia\RedisVsFiles\Cache\Files\ArrayCacheHandler as FilesArrayCacheHandler;
use LizardMedia\RedisVsFiles\Cache\Redis\ArrayCacheHandler as RedisArrayCacheHandler;
use LizardMedia\RedisVsFiles\DataProvider\ArrayDataProvider;
use LizardMedia\RedisVsFiles\Utilities\Timer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ArrayCacheCommand
 * @package LizardMedia\RedisVsFiles\Command
 */
class ArrayCacheCommand extends AbstractCacheCommand
{
    /**
     * @var string
     */
    protected const COMMAND_NAME = 'app:cache:array';

    /**
     * @var string
     */
    protected const COMMAND_DESC = 'Process array-type cache: write, read and clean cache in Redis and files';

    /**
     * @var string
     */
    protected const CACHE_KEY = 'array_cache_key';

    /**
     * @var Timer
     */
    protected $timer;

    /**
     * @var FilesArrayCacheHandler
     */
    protected $fileCacheHandler;

    /**
     * @var RedisArrayCacheHandler
     */
    protected $redisCacheHandler;

    /**
     * @var ArrayDataProvider
     */
    protected $dataProvider;

    /**
     * ArrayCacheCommand constructor.
     * @param string|null $name
     */
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
        $this->timer = new Timer();
        $this->fileCacheHandler = new FilesArrayCacheHandler();
        $this->redisCacheHandler = new RedisArrayCacheHandler();
        $this->dataProvider = new ArrayDataProvider();
    }

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription(self::COMMAND_DESC);

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->runTest($input, $output);
    }
}
