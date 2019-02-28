<?php
declare(strict_types=1);

/**
 * File:StringDataProvider.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\DataProvider;

/**
 * Class StringDataProvider
 * @package LizardMedia\RedisVsFiles\DataProvider
 */
class StringDataProvider
{
    /**
     * @return string
     */
    public function getData(): string
    {
        return '<html>I am a string that you want to cache for later use</html>';
    }
}
