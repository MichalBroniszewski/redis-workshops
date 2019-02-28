<?php
declare(strict_types=1);

/**
 * File:StringCacheHandler.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Cache\Files;

use LizardMedia\RedisVsFiles\Cache\StringCacheHandlerInterface;

/**
 * Class StringCacheHandler
 * @package LizardMedia\RedisVsFiles\Cache\Files
 */
class StringCacheHandler implements StringCacheHandlerInterface
{
    /**
     * @param string $key
     * @param string $data
     * @return void
     */
    public function write(string $key, string $data): void
    {
        file_put_contents(__DIR__ . '/../../../var/cache' . $key, $data);
    }

    /**
     * @param string $key
     * @return string
     */
    public function read(string $key): string
    {
        return file_get_contents(__DIR__ . '/../../../var/cache' . $key);
    }

    /**
     * @param string $key
     * @return void
     */
    public function clear(string $key): void
    {
        unlink(__DIR__ . '/../../../var/cache' . $key);
    }
}
