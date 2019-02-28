<?php
declare(strict_types=1);

/**
 * File:HashCacheHandler.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Cache\Files;

use LizardMedia\RedisVsFiles\Cache\HashCacheHandlerInterface;

/**
 * Class HashCacheHandler
 * @package LizardMedia\RedisVsFiles\Cache\Files
 */
class HashCacheHandler implements HashCacheHandlerInterface
{
    /**
     * @param string $key
     * @param array $data
     * @return void
     */
    public function write(string $key, array $data): void
    {
        $data = json_encode($data);
        file_put_contents(__DIR__ . '/../../../var/cache' . $key, $data);
    }

    /**
     * @param string $key
     * @return array
     */
    public function read(string $key): array
    {
        $data = file_get_contents(__DIR__ . '/../../../var/cache' . $key);
        return json_decode($data, true);
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
