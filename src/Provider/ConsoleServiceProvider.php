<?php

namespace KanAfghan\KyyDownloader\Provider;

use Flint\Console\Application as Console;
use Silex\Application;
use KanAfghan\KyyDownloader\Console\Command\DownloadCommand;

/**
 * @package kyy-downloader
 */
class ConsoleServiceProvider implements \Silex\ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Application $app)
    {
        $app['console'] = $app->share(function ($app) {
            $console = new Console($app, 'KYY Downloader', '1.0');
            $console->setDispatcher($app['dispatcher']);

            return $console;
        });

        $app['console.commands'] = function () use ($app) {
            return [
                new DownloadCommand,
            ];
        };
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Application $app)
    {
    }
}
