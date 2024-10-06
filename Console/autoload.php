<?php
/**
 * Load all Interfaces
 */
include_once __DIR__ . '/../src/Interface/ServerInterface.php';
include_once __DIR__ . '/../src/Interface/CommandInterface.php';
include_once __DIR__ . '/../src/Interface/ColorCodeInterface.php';
include_once __DIR__ . '/../src/Interface/StyleConsoleInterface.php';
/**
 * Load Command Styles
 */
include_once __DIR__ . '/../src/Style/Output.php';
include_once __DIR__ . '/../src/Style/ColorCode.php';
include_once __DIR__ . '/../src/Style/StyleConsole.php';
/**
 * Load all Class
 */
include_once __DIR__ . '/../src/Loader/HotReload.php';
include_once __DIR__ . '/../src/Server.php';
include_once __DIR__ . '/../src/Command.php';
/**
 * Command Entry Point
 */
include_once __DIR__ . '/Console.php';
