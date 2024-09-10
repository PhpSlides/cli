<?php

use PhpSlides\Foundation\Application;

include dirname(__DIR__) . '/../vendor/autoload.php';

/**
 * --------------------------------------------------------------------
 * This is the Bootstrap File in starting the application.
 * The entry point for the PhpSlides project and functions.
 * --------------------------------------------------------------------
 */
Application::configure(basePath: dirname(dirname(__DIR__)))->create();
