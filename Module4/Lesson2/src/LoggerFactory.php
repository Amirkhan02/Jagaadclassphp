<?php

namespace QualityToolsExample;

use Psr\Log\LoggerInterface;

use Monolog\Level;
//use Monolog\Logger;
use Monolog\Handler\StreamHandler;
//use Monolog\Handler\SlackHandler;
use Consolidation\Log\Logger;
use Symfony\Component\Console\Output\ConsoleOutput;

class LoggerFactory
{
    public static function make(): LoggerInterface
    {
        // monolog example
        $log = new Logger('my-logger');
        $log->pushHandler(new StreamHandler(__DIR__ . '/../log/all.log', Level::Info));
//         $log->pushHandler(new StreamHandler($token, $channel, Level::Critical));
        return $log;

//         $log->info('');
//         $log->critical('');

         //symfony
         //$logger = new Logger(new \Symfony\Component\Console\Output\StreamOutput(fopen(__DIR__ . '/../log/all.log', 'wb+')));
        //$log = new \QualityToolsExample\MyLogger();

        return new MyLogger();


    }

}