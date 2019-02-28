<?php
declare(strict_types=1);

/**
 * File:ArrayDataProvider.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\DataProvider;

/**
 * Class ArrayDataProvider
 * @package LizardMedia\RedisVsFiles\DataProvider
 */
class ArrayDataProvider
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'one',
            'two',
            'three',
            'four',
            'five',
            'six',
        ];
    }
}
