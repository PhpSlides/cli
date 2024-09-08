<?php declare(strict_types=1);

class Command implements CommandInterface
{
	/**
	 * SHOW HELP MESSAGE IN THE StyleConsole
	 * --help command
	 */
	public static function showHelp(): void
	{
		output(StyleConsole::yellow("______  _           _____ _       _\n"));
		output(StyleConsole::yellow("|  __ \| |         / ____| (•)   | | \n"));
		output(
			StyleConsole::yellow("| |__) | |__  _ __| (___ | |_  __| | ___\n")
		);
		output(
			StyleConsole::yellow("|  ___/| '_ \| '_ \\\\___ \| | |/ _` |/ _ \\\n")
		);
		output(
			StyleConsole::yellow("| |    | | | | |_) |___) | | | (_| |  __/\n")
		);
		output(
			StyleConsole::yellow("|_|    |_| |_| .__/_____/|_|_|\__,_|\___|\n")
		);
		output(StyleConsole::yellow("             | |\n"));
		output(StyleConsole::yellow("             |_|\n\n"));
		output(
			StyleConsole::text('CLI Version', ColorCode::YELLOW, ColorCode::BOLD)
		);
		output(
			StyleConsole::text(" 1.0.0\n\n", ColorCode::BOLD, ColorCode::GREEN)
		);
		output(StyleConsole::text('Usage:', ColorCode::YELLOW, ColorCode::BOLD));
		output(" phpslides [command] [options] [...args]\n\n");
		output(
			StyleConsole::text("Commands:\n", ColorCode::YELLOW, ColorCode::BOLD)
		);
		output(StyleConsole::green('  serve'));
		output(
			"                        Run and serve the PhpSlides project in dev mode.\n"
		);
		output(StyleConsole::green('  make:controller <name>'));
		output("       Create a route controller class.\n");
		output(StyleConsole::green('  make:api-controller <name>'));
		output("   Create an API controller class.\n");
		output(StyleConsole::green('  make:auth-guard <name>'));
		output("       Create an AuthGuard class.\n");
		output(StyleConsole::green('  make:forge-db [db] <tables>'));
		output("  Create new Tables & Columns in a Forge Database.\n");
		output(StyleConsole::green('  generate:secret-key <length>'));
		output(" Generate a random secret key for JWT.\n");
		output(StyleConsole::green('  -h, --help'));
		output("                   Show this help message and exit.\n\n");
		output(
			StyleConsole::text("Options:\n", ColorCode::YELLOW, ColorCode::BOLD)
		);
		output(StyleConsole::green('  --strict'));
		output(
			"                     Enforce strict class standards in the code.\n"
		);
		output(StyleConsole::green('  --host'));
		output(
			"                       Change the default host in serving the project.\n"
		);
		output(StyleConsole::green('  --port'));
		output(
			"                       Change the default port in serving the project.\n\n"
		);

		/*output(file_get_contents(
   		 __DIR__ . '/Template/commands/Commands.tmp'
   	 ));*/
		exit(1);
	}

	/**
	 * MAKE CONTROLLER CLASS AND ADD FILES IN THE CONTROLLER LOCATION
	 * make:controller command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeController(array $arguments): void
	{
		$cn = $arguments[0];
		$ct = $arguments[1] ?? null;

		/**
		 * Converts controller class to CamelCase
		 * Adds Controller if its not specified
		 */
		$cn = strtoupper($cn[0]) . substr($cn, 1, strlen($cn));
		$cn = str_ends_with($cn, 'Controller') ? $cn : $cn . 'Controller';

		// create class name and namespace
		$namespace = 'App\\Controller';
		$classname = $namespace . '\\' . $cn;

		$content = file_get_contents(
			__DIR__ . '/Template/controller/Controller.tmp'
		);
		$strict = $ct === '--strict' ? 'declare(strict_types=1);' : '';

		$content = str_replace('{{name}}', $cn, $content);
		$content = str_replace('<?php', "<?php $strict", $content);

		// checks if controller directory exists
		if (!is_dir('app/Controller')) {
			!is_dir('app') && mkdir('app');
			mkdir('app/Controller');
		}

		// checks if class already exists
		if (file_exists("app/Controller/$cn.php")) {
			output(StyleConsole::bgRed('Error: '));
			output(StyleConsole::bold(" Controller file already exists: $cn\n"));
		}
		// if cannot add contents to the file
		elseif (!file_put_contents("app/Controller/$cn.php", $content)) {
			output(StyleConsole::bgRed('Error: '));
			output(StyleConsole::bold(" Unable to create controller: $cn\n"));
		}
		// if controller is added successfully
		else {
			shell_exec('composer dump-autoload');
			output(
				StyleConsole::bold(
					"$cn created successfully at app/Controller/$cn.php\n"
				)
			);
		}

		exit(1);
	}

	/**
	 * MAKE API CONTROLLER CLASS
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeApiController(array $arguments): void
	{
		$cn = $arguments[0];
		$ct = $arguments[1] ?? null;

		/**
		 * Converts controller class to CamelCase
		 * Adds Controller if its not specified
		 */
		$cn = strtoupper($cn[0]) . substr($cn, 1, strlen($cn));
		$cn = str_ends_with($cn, 'Controller') ? $cn : $cn . 'Controller';

		// create class name and namespace
		$namespace = 'App\\Controller\\Api';
		$classname = $namespace . '\\' . $cn;

		$content = file_get_contents(__DIR__ . '/Template/api/ApiController.tmp');
		$strict = $ct === '--strict' ? 'declare(strict_types=1);' : '';

		$content = str_replace('{{name}}', $cn, $content);
		$content = str_replace('<?php', "<?php $strict", $content);

		// checks if api controller directory exists
		if (!is_dir('app/Controller/Api')) {
			!is_dir('app') && mkdir('app');
			!is_dir('app/Controller') && mkdir('app/Controller');
			mkdir('app/Controller/Api');
		}

		if (file_exists("app/Controller/Api/$cn.php")) {
			output(StyleConsole::bgRed('Error: '));
			output(
				StyleConsole::bold(
					" File name already exists at app/Controller/Api/$cn.php\n"
				)
			);
		}
		// if cannot add contents to the file
		elseif (!file_put_contents("app/Controller/Api/$cn.php", $content)) {
			output(StyleConsole::bgRed('Error: '));
			output(StyleConsole::bold(" Unable to create Api controller: $cn\n"));
		}
		// if api controller is added successfully
		else {
			shell_exec('composer dump-autoload');
			output(
				StyleConsole::bold(
					"$cn created successfully at app/Controller/Api/$cn.php\n"
				)
			);
		}

		exit(1);
	}

	/**
	 * MAKE AUTHENTICATION GUARD FOR ROUTES
	 * make:auth-guard command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeAuthGuard(array $arguments): void
	{
		$cn = $arguments[0];
		$ct = $arguments[1] ?? null;

		/**
		 * Converts middleware class to CamelCase
		 * Adds Middleware if its not specified
		 */
		$cn = strtoupper($cn[0]) . substr($cn, 1, strlen($cn));
		$cn = str_ends_with($cn, 'Guard') ? $cn : $cn . 'Guard';

		// create class name and namespace
		$namespace = 'App\\Guards';
		$classname = $namespace . '\\' . $cn;

		$content = file_get_contents(__DIR__ . '/Template/guards/AuthGuard.tmp');
		$strict = $ct === '--strict' ? 'declare(strict_types=1);' : '';

		$content = str_replace('{{name}}', $cn, $content);
		$content = str_replace('<?php', "<?php $strict", $content);

		// checks if authentication guard directory exists
		if (!is_dir('app/Guards')) {
			!is_dir('app') && mkdir('app');
			mkdir('app/Guards');
		}

		if (file_exists("app/Guards/$cn.php")) {
			output(StyleConsole::bgRed('Error: '));
			output(
				StyleConsole::bold(
					" File name already exists at app/Guards/$cn.php\n"
				)
			);
		}
		// if cannot add contents to the file
		elseif (!file_put_contents("app/Guards/$cn.php", $content)) {
			output(StyleConsole::bgRed('Error: '));
			output(StyleConsole::bold(" Unable to create AuthGuard: $cn\n"));
		}
		// if middleware is added successfully
		else {
			shell_exec('composer dump-autoload');
			output(
				StyleConsole::bold(
					"$cn created successfully at app/Guards/$cn.php\n"
				)
			);
		}

		exit(1);
	}

	/**
	 * GENERATE SECRET KEY FOR JWT USE
	 * generate:secret-key command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function generateSecretKey(array $arguments): void
	{
		$length = $arguments[0] ?? 32;
		$key = base64_encode(random_bytes((int) $length));

		output(StyleConsole::bold("\n$key\n"));
		exit();
	}

	/**
	 * CREATE A DATABASE USING THE FORGE COMMAND
	 * make:forge-db command
	 *
	 * @param array $arguments It contains details of the database to create
	 */
	public static function makeForgeDB(array $arguments): void
	{
		$db_name = $arguments[0];
		$table_name = $arguments[1] ?? null;
		$column_name = $arguments[2] ?? null;

		if (!$table_name) {
			exit("<table> option is required!\n");
		}
		!is_dir('app') && mkdir('app');

		# If there's no database directory, create it.
		if (!is_dir("app/Forge/$db_name")) {
			!is_dir('app/Forge') && mkdir('app/Forge');

			output(StyleConsole::green("Creating Database…\n"));
			mkdir("app/Forge/$db_name");

			copy(
				__DIR__ . '/Template/database/options.sql',
				"app/Forge/$db_name/options.sql"
			);
		} else {
			output(
				StyleConsole::yellow(
					"`$db_name` database already exists, skipping…\n\n"
				)
			);
		}
		usleep(300000);

		$dir = "app/Forge/$db_name/$table_name";

		# Checks if the table already exists, else create it
		if (is_dir($dir)) {
			output(
				StyleConsole::yellow(
					"`$table_name` table already exists, skipping…\n\n"
				)
			);
		} else {
			output(StyleConsole::green("Creating Table…\n"));
			mkdir($dir);
		}
		usleep(300000);
		output(StyleConsole::green("Adding columns…\n"));

		/**
		 * Get content from the template Forge file
		 */
		$content = file_get_contents(__DIR__ . '/Template/database/Forge.tmp');
		$content = str_replace('{table_name}', $table_name, $content);
		$content = str_replace('{db_name}', $db_name, $content);

		if (!file_exists($dir . "/$table_name.php")) {
			file_put_contents($dir . "/$table_name.php", $content);
		}

		/**
		 * Checks if columns arguments are provided
		 */
		if ($column_name) {
			$total_columns = 0;
			$columns = mb_split(' ', $column_name);

			foreach ($columns as $key => $value) {
				$key += 1;
				$file = "$dir/$key-$value";
				usleep(300000);

				if (is_file($file)) {
					output(
						StyleConsole::yellow(
							"`$value` column already exists, skipping…\n"
						)
					);
				} else {
					if ($value == 'id' || str_ends_with('_id', $value)) {
						file_put_contents(
							$file,
							"TYPE => INT\nLENGTH => 11\nNULL => FALSE\nPRIMARY => TRUE\nAUTO_INCREMENT => TRUE"
						);
					} else {
						file_put_contents(
							$file,
							"TYPE => VARCHAR\nLENGTH => 225\nNULL => FALSE"
						);
					}
					$total_columns++;
				}
			}

			output(StyleConsole::green("Created table with $total_columns"));
			output(
				StyleConsole::green(
					$total_columns > 1 ? " columns.\n" : " column.\n"
				)
			);
		} else {
			output(StyleConsole::green("Created an empty table.\n"));
		}

		usleep(300000);
		output(StyleConsole::green("Done ✅ \n"));
	}
}
