<?php
declare(strict_types=1);

/**
 * File:ArrayCacheHandler.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Cache\Redis;

use LizardMedia\RedisVsFiles\Cache\ArrayCacheHandlerInterface;
use Redis;

/**
 * Class ArrayCacheHandler
 * @package LizardMedia\RedisVsFiles\Cache\Redis
 */
class ArrayCacheHandler implements ArrayCacheHandlerInterface
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
     * @param array $data
     * @return void
     */
    public function write(string $key, array $data): void
    {
        $this->connection->rPush($key, ...$data);
    }

    /**
     * @param string $key
     * @return array
     */
    public function read(string $key): array
    {
        return $this->connection->lRange($key, 0, -1);
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
