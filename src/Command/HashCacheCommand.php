<?php
declare(strict_types=1);

/**
 * File:HashCacheCommand.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Command;

use LizardMedia\RedisVsFiles\Cache\Files\HashCacheHandler as FilesHashCacheHandler;
use LizardMedia\RedisVsFiles\Cache\Redis\HashCacheHandler as RedisHashCacheHandler;
use LizardMedia\RedisVsFiles\DataProvider\HashDataProvider;
use LizardMedia\RedisVsFiles\Utilities\Timer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HashCacheCommand
 * @package LizardMedia\RedisVsFiles\Command
 */
class HashCacheCommand extends AbstractCacheCommand
{
    /**
     * @var string
     */
    protected const COMMAND_NAME = 'app:cache:hash';

    /**
     * @var string
     */
    protected const COMMAND_DESC = 'Process hash-type cache: write, read and clean cache in Redis and files';

    /**
     * @var string
     */
    protected const CACHE_KEY = 'hash_cache_key';

    /**
     * @var Timer
     */
    protected $timer;

    /**
     * @var FilesHashCacheHandler
     */
    protected $fileCacheHandler;

    /**
     * @var RedisHashCacheHandler
     */
    protected $redisCacheHandler;

    /**
     * @var HashDataProvider
     */
    protected $dataProvider;

    /**
     * HashCacheCommand constructor.
     * @param string|null $name
     */
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
        $this->timer = new Timer();
        $this->fileCacheHandler = new FilesHashCacheHandler();
        $this->redisCacheHandler = new RedisHashCacheHandler();
        $this->dataProvider = new HashDataProvider();
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
