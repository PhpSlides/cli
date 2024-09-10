<?php declare(strict_types=1);

interface CommandInterface
{
	/**
	 * CREATE A NEW PROJECT WOTH COMPOSER
	 * `create project-name` command
	 *
	 * @param array $arguments It contains details of the project to create
	 */
	public static function createProject(array $arguments): void;

	/**
	 * SHOW HELP MESSAGE IN THE StyleConsole
	 * --help command
	 */
	public static function showHelp(): void;

	/**
	 * MAKE CONTROLLER CLASS AND ADD FILES IN THE CONTROLLER LOCATION
	 * `make:controller` command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeController(array $arguments): void;

	/**
	 * MAKE API CONTROLLER CLASS
	 * `make:api-controller` command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeApiController(array $arguments): void;

	/**
	 * MAKE AUTHENTICATION GUARD FOR ROUTES
	 * `make:auth-guard` command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeAuthGuard(array $arguments): void;

	/**
	 * GENERATE SECRET KEY FOR JWT USE
	 * `generate:secret-key` command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function generateSecretKey(array $arguments): void;

	/**
	 * CREATE A DATABASE USING THE FORGE COMMAND
	 * `make:forge-db` command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeForgeDB(array $arguments): void;
}
