<?php

namespace KanAfghan\KyyDownloader;

use KanAfghan\KyyDownloader\Provider\ConsoleServiceProvider;
use Silex\Provider\MonologServiceProvider;

/**
 * @package skeleton
 */
class Application extends \Flint\Application
{
    /**
     * @param string  $rootDir
     * @param string  $env
     * @param boolean $debug
     */
    public function __construct($rootDir, $env, $debug = false)
    {
        parent::__construct($rootDir, $debug, array(
            'env'              => $env,
            'cache_dir'        => $rootDir . '/var/cache/' . $env,
            'config.cache_dir' => $rootDir . '/var/cache/' . $env . '/config',
        ));

        $this->initialize();
    }

    /**
     * Register service providers.
     */
    protected function initialize()
    {
        if ('cli' === php_sapi_name()) {
            $this->register(new ConsoleServiceProvider);
        }

        $this->register(new MonologServiceProvider);

        $this->configure('config/' . $this['env'] . '.json');
    }
}
