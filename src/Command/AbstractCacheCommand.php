<?php
declare(strict_types=1);

/**
 * File:AbstractCacheCommand.php
 *
 * @author Maciej Sławik <maciej.slawik@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\RedisVsFiles\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AbstractCacheCommand
 * @package LizardMedia\RedisVsFiles\Command
 */
abstract class AbstractCacheCommand extends Command
{
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    public function runTest(InputInterface $input, OutputInterface $output): void
    {
        $data = $this->dataProvider->getData();
        $output->writeln("<info>Data to save:</info>");
        var_dump($data);

        $output->writeln("<comment>Saving data to a file...</comment>");
        $this->timer->startTimer();
        for ($i = 0; $i < 10; $i++) {
            $this->fileCacheHandler->write(static::CACHE_KEY . $i, $data);
        }
        $this->timer->stopTimer();
        $output->writeln("<info>Data saved to a file. Total time: {$this->timer->getExecutionTimeInMiliseconds()}</info>");

        $output->writeln("<comment>Saving data to Redis...</comment>");
        $this->timer->startTimer();
        for ($i = 0; $i < 10; $i++) {
            $this->redisCacheHandler->write(static::CACHE_KEY . $i, $data);
        }
        $this->timer->stopTimer();
        $output->writeln("<info>Data saved to Redis. Total time: {$this->timer->getExecutionTimeInMiliseconds()}</info>");

        $output->writeln("<comment>Reading data from a file...</comment>");
        $this->timer->startTimer();
        for ($i = 0; $i < 10; $i++) {
            $fileData = $this->fileCacheHandler->read(static::CACHE_KEY . $i);
        }
        var_dump($fileData);
        $this->timer->stopTimer();
        $output->writeln("<info>Data read from a file. Total time: {$this->timer->getExecutionTimeInMiliseconds()}</info>");

        $output->writeln("<comment>Reading data from Redis...</comment>");
        $this->timer->startTimer();
        for ($i = 0; $i < 10; $i++) {
            $redisData = $this->redisCacheHandler->read(static::CACHE_KEY . $i);
        }
        var_dump($redisData);
        $this->timer->stopTimer();
        $output->writeln("<info>Data read from Redis. Total time: {$this->timer->getExecutionTimeInMiliseconds()}</info>");

        $output->writeln("<comment>Clearing file cache...</comment>");
        $this->timer->startTimer();
        for ($i = 0; $i < 10; $i++) {
            $this->fileCacheHandler->clear(static::CACHE_KEY . $i);
        }
        $this->timer->stopTimer();
        $output->writeln("<info>File data cleared. Total time: {$this->timer->getExecutionTimeInMiliseconds()}</info>");

        $output->writeln("<comment>Clearing Redis cache...</comment>");
        $this->timer->startTimer();
        for ($i = 0; $i < 10; $i++) {
            $this->redisCacheHandler->clear(static::CACHE_KEY . $i);
        }
        $this->timer->stopTimer();
        $output->writeln("<info>Redis data cleared. Total time: {$this->timer->getExecutionTimeInMiliseconds()}</info>");
    }
}
