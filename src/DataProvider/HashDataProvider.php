<?php
declare(strict_types=1);

/**
 * File:HashDataProvider.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\DataProvider;

/**
 * Class HashDataProvider
 * @package LizardMedia\RedisVsFiles\DataProvider
 */
class HashDataProvider
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'name' => 'Mirror, mirror on the wall',
            'description' => 'Whose the prettiest of them all?',
            'price' => 100.00,
            'special_price' => 90.00
        ];
    }
}
