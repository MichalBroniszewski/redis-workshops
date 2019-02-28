<?php
declare(strict_types=1);

/**
 * File:StringCacheCommand.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Command;

use LizardMedia\RedisVsFiles\Cache\Files\StringCacheHandler as FilesStringCacheHandler;
use LizardMedia\RedisVsFiles\Cache\Redis\StringCacheHandler as RedisStringCacheHandler;
use LizardMedia\RedisVsFiles\DataProvider\StringDataProvider;
use LizardMedia\RedisVsFiles\Utilities\Timer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class StringCacheCommand
 * @package LizardMedia\RedisVsFiles\Command
 */
class StringCacheCommand extends AbstractCacheCommand
{
    /**
     * @var string
     */
    protected const COMMAND_NAME = 'app:cache:string';

    /**
     * @var string
     */
    protected const COMMAND_DESC = 'Process string-type cache: write, read and clean cache in Redis and files';

    /**
     * @var string
     */
    protected const CACHE_KEY = 'string_cache_key';

    /**
     * @var Timer
     */
    protected $timer;

    /**
     * @var FilesStringCacheHandler
     */
    protected $fileCacheHandler;

    /**
     * @var RedisStringCacheHandler
     */
    protected $redisCacheHandler;

    /**
     * @var StringDataProvider
     */
    protected $dataProvider;

    /**
     * StringCacheCommand constructor.
     * @param string|null $name
     */
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
        $this->timer = new Timer();
        $this->fileCacheHandler = new FilesStringCacheHandler();
        $this->redisCacheHandler = new RedisStringCacheHandler();
        $this->dataProvider = new StringDataProvider();
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
