<?php

namespace KanAfghan\KyyDownloader;

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;

/**
 * @param  string  $env
 * @return boolean
 */
function debug_enabled($env)
{
    return in_array($env, array('dev', 'test'));
}

/**
 * @param  string      $env
 * @return Application
 */
function create_application($env)
{
    return new Application(__DIR__ . '/../', $env, debug_enabled($env));
}

/**
 * Setup converting errors to exceptions.
 *
 * @param string  $env
 * @param boolean $exception
 */
function initialize_error_handler($env, $exception = true)
{
    $debug = debug_enabled($env);

    ErrorHandler::register(null, $debug);

    if ($exception) {
        ExceptionHandler::register($debug);
    }
}
