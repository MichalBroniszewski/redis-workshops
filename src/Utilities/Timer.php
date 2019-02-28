<?php
declare(strict_types=1);

/**
 * File:Timer.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Utilities;

/**
 * Class Timer
 * @package LizardMedia\RedisVsFiles\Utilities
 */
class Timer
{
    /**
     * @var float
     */
    private $timeStart = 0.0;

    /**
     * @var float
     */
    private $timeStop = 0.0;

    /**
     * @return void
     */
    public function startTimer(): void
    {
        $this->timeStart = microtime(true);
    }

    /**
     * @return void
     */
    public function stopTimer(): void
    {
        $this->timeStop = microtime(true);
    }

    /**
     * @return float
     */
    public function getExecutionTimeInMiliseconds(): float
    {
        $executionTime = ($this->timeStop - $this->timeStart) * 1000;
        $this->timeStart = 0.0;
        $this->timeStop = 0.0;
        return $executionTime;
    }
}
