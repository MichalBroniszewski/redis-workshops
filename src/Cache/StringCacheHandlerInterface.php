<?php
declare(strict_types=1);

/**
 * File:StringCacheHandlerInterface.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Cache;

/**
 * Interface StringCacheHandlerInterface
 * @package LizardMedia\RedisVsFiles\Cache
 */
interface StringCacheHandlerInterface
{
    /**
     * @param string $key
     * @param string $data
     * @return void
     */
    public function write(string $key, string $data): void;

    /**
     * @param string $key
     * @return array
     */
    public function read(string $key): string;

    /**
     * @param string $key
     * @return void
     */
    public function clear(string $key): void;
}
