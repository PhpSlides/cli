<?php declare(strict_types=1);

interface CommandInterface
{
	/**
	 * SHOW HELP MESSAGE IN THE StyleConsole
	 * --help command
	 */
	public static function showHelp(): void;

	/**
	 * MAKE CONTROLLER CLASS AND ADD FILES IN THE CONTROLLER LOCATION
	 * make:controller command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeController(array $arguments): void;

	/**
	 * MAKE API CONTROLLER CLASS
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeApiController(array $arguments): void;

	/**
	 * MAKE AUTHENTICATION GUARD FOR ROUTES
	 * make:auth-guard command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeAuthGuard(array $arguments): void;

	/**
	 * GENERATE SECRET KEY FOR JWT USE
	 * generate:secret-key command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function generateSecretKey(array $arguments): void;
	
	/**
	 * CREATE A DATABASE USING THE FORGE COMMAND
	 * make:forge-db command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeForgeDB(array $arguments): void;
}
