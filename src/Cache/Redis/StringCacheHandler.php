<?php
declare(strict_types=1);

/**
 * File:StringCacheHandler.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Cache\Redis;

use LizardMedia\RedisVsFiles\Cache\StringCacheHandlerInterface;
use Redis;

/**
 * Class StringCacheHandler
 * @package LizardMedia\RedisVsFiles\Cache\Redis
 */
class StringCacheHandler implements StringCacheHandlerInterface
{
    /**
     * @var Redis
     */
    private $connection;

    /**
     * StringCacheHandler constructor.
     */
    public function __construct()
    {
        $this->connection = new Redis();
        $this->connection->connect(getenv('REDIS_HOST'), (int)getenv('REDIS_PORT'));
        $this->connection->auth(getenv('REDIS_PASSWORD'));
    }

    /**
     * @param string $key
     * @param string $data
     * @return void
     */
    public function write(string $key, string $data): void
    {
        $this->connection->set($key, $data);
    }

    /**
     * @param string $key
     * @return string
     */
    public function read(string $key): string
    {
        return (string) $this->connection->get($key);
    }

    /**
     * @param string $key
     * @return void
     */
    public function clear(string $key): void
    {
        $this->connection->delete($key);
    }
}
