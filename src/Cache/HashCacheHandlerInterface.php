<?php
declare(strict_types=1);

/**
 * File:HashCacheHandlerInterface.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Cache;

/**
 * Interface HashCacheHandlerInterface
 * @package LizardMedia\RedisVsFiles\Cache
 */
interface HashCacheHandlerInterface
{
    /**
     * @param string $key
     * @param array $data
     * @return void
     */
    public function write(string $key, array $data): void;

    /**
     * @param string $key
     * @return array
     */
    public function read(string $key): array;

    /**
     * @param string $key
     * @return void
     */
    public function clear(string $key): void;
}
