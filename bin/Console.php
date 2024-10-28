<?php
declare(strict_types=1);

/**
 * PhpSlides Console
 *
 * This class handles command line input
 * and manages server-related commands.
 */
class Console extends Command implements CommandInterface
{
	private static ?array $serve = null;
	private static ?array $commands = null;

	/**
	 * Console constructor.
	 *
	 * @param array $argv The command line arguments.
	 */
	public function __construct()
	{
		global $argv;

		# Check for the command and arguments
		$command = $argv;

		$arguments = array_slice($command, 2);
		$options = getopt('h', ['help']);

		if (
			isset($options['help']) ||
			isset($options['h']) ||
			!isset($command[1])
		) {
			self::showHelp();
		}

		# Handle commands
		switch (trim($command[1])) {
			case 'serve':
				self::$serve = $arguments;
				break;

			case 'create':
				self::$commands = ['create-project', $arguments];
				break;

			case 'make:controller':
				if (count($arguments) < 1) {
					exit(
						"<name> argument is required! Type --help for list of commands\n"
					);
				}
				self::$commands = ['controller', $arguments];
				break;

			case 'make:api-controller':
				if (count($arguments) < 1) {
					exit(
						"<name> argument is required! Type --help for list of commands\n"
					);
				}
				self::$commands = ['api-controller', $arguments];
				break;

			case 'make:auth-guard':
				if (count($arguments) < 1) {
					exit(
						"<name> argument is required! Type --help for list of commands\n"
					);
				}
				self::$commands = ['auth-guard', $arguments];
				break;

			case 'make:forge-db':
				if (count($arguments) < 1) {
					exit(
						"[db] argument is required! Type --help for list of commands\n"
					);
				}
				self::$commands = ['forge-db', $arguments];
				break;

			case 'generate:secret-key':
				self::$commands = ['secret-key', $arguments];
				break;

			default:
				$styles = [ColorCode::WHITE, ColorCode::BG_RED];

				output(
					StyleConsole::text(
						'Command not Recognized! See \'phpslide --help\'',
						...$styles
					)
				);
				break;
		}
	}

	/**
	 * Console destructor.
	 */
	public function __destruct()
	{
		if (self::$serve !== null) {
			new Server(self::$serve);
		}

		if (self::$commands) {
			switch (trim(self::$commands[0])) {
				case 'create-project':
					self::createProject(self::$commands[1]);
					break;

				case 'controller':
					self::makeController(self::$commands[1]);
					break;

				case 'api-controller':
					self::makeApiController(self::$commands[1]);
					break;

				case 'auth-guard':
					self::makeAuthGuard(self::$commands[1]);
					break;

				case 'forge-db':
					self::makeForgeDB(self::$commands[1]);
					break;

				case 'secret-key':
					self::generateSecretKey(self::$commands[1]);
					break;

				default:
					exit('Error.');
			}
		}

		echo "\n";
	}
}
