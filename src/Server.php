<?php declare(strict_types=1);

/**
 * PhpSlides Server
 *
 * This class creates a dynamic PHP server,
 * allowing for start, stop, and status commands.
 */
class Server implements ServerInterface
{
	private string $resolve;
	private string $host;
	private int $port;
	private int $pid;

	private $process = false;
	private $pipes = null;

	/**
	 * Check if the port is currently in use.
	 *
	 * @return bool True if the port is in use, false otherwise.
	 */
	public function isPortInUse(): bool
	{
		$connection = @fsockopen($this->host, $this->port);
		if (is_resource($connection)) {
			fclose($connection);
			return true;
		}
		return false;
	}

	/**
	 * Start the PhpSlides server.
	 *
	 * @return bool True if the server started successfully, false otherwise.
	 */
	public function startServer(): bool
	{
		$descriptorspec = [
			0 => ['pipe', 'r'], // stdin is a pipe that the child will read from
			1 => ['pipe', 'w'], // stdout is a pipe that the child will write to
			2 => ['pipe', 'w'] // stderr is a pipe that the child will write to
		];

		$command = sprintf(
			'php -S %s:%s -t %s %s',
			$this->host,
			$this->port,
			$this->resolve,
			$this->resolve . 'app.php'
		);

		$this->process = proc_open($command, $descriptorspec, $pipes);
		$this->pipes = $pipes;

		if (is_resource($this->process)) {
			$this->pid = proc_get_status($this->process)['pid'];

			output(StyleConsole::yellow(" _____  _           _____ _       _\n"));
			output(
				StyleConsole::yellow("|  __ \| |         / ____| (.)   | | \n")
			);
			output(
				StyleConsole::yellow("| |__) | |__  _ __| (___ | |_  __| | ___\n")
			);
			output(
				StyleConsole::yellow(
					"|  ___/| '_ \| '_ \\\\___ \| | |/ _` |/ _ \\\n"
				)
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
				StyleConsole::bold(
					"Started server at http://{$this->host}:{$this->port}\n"
				)
			);
			output(
				StyleConsole::text(
					"Type 'stop' or Ctrl+C to stop the server.",
					ColorCode::BG_CYAN,
					ColorCode::BOLD
				)
			);
			output("\n\n");

			return true;
		} else {
			return false;
		}
	}

	/**
	 * Stop the PHP server.
	 */
	public function stopServer(): void
	{
		if (is_resource($this->process)) {
			proc_terminate($this->process);
			proc_close($this->process);
			output("Server stopped.\n");
		}
	}

	/**
	 * Display the current status of the server.
	 */
	public function serverStatus(): void
	{
		$status = proc_get_status($this->process);

		if ($status['running']) {
			output("Server running with PID {$status['pid']}\n");
		} else {
			output("Server is not running.\n");
		}
	}

	/**
	 * Display available server commands.
	 */
	public function showCommands(): void
	{
		output(StyleConsole::green('stop'));
		output("    - Stop the server\n");
		output(StyleConsole::green('status'));
		output("  - Display server status\n");
		output(StyleConsole::green('restart'));
		output(" - Restart the server\n");
		output(StyleConsole::green('help'));
		output("    - Display this help message\n\n");
	}

	/**
	 * Server constructor.
	 *
	 * @param array $arguments The Host and Port stored in here
	 */
	public function __construct(array $arguments)
	{
		$http = explode(':', $arguments[0] ?? '');

		$this->host = isset($http[0]) ? $http[0] : 'localhost';
		$this->port = isset($http[1]) ? (int) $http[1] : 2200;
		$this->resolve = 'src/boostrap/';

		// Check if the provided local address and its port is in use.
		if ($this->isPortInUse()) {
			output(StyleConsole::bgRed('Error: '));
			output(StyleConsole::bold(" Port {$this->port} is already in use.\n"));
			exit(1);
		}

		// Start the server, and check if the server started successfully.
		if (!$this->startServer()) {
			output(
				StyleConsole::text(
					"Error while starting server.\n",
					ColorCode::BG_RED,
					ColorCode::BOLD
				)
			);
			exit(1);
		}
		$this->showCommands();

		// Register the stopServer function to be called on script termination
		register_shutdown_function([$this, 'stopServer'], $this->process);

		while (true) {
			$input = fgets(STDIN) ?: ''; // Using STDIN directly

			if (trim($input) === 'stop') {
				$this->stopServer();
				break;
			}

			if ($input !== false) {
				$input = trim($input);
				$this->handleInputCommands($input);
			}

			sleep(1);
		}

		exit();
	}

	/**
	 * Handle input commands from the giving input.
	 *
	 * @param string $input The input string.
	 */
	public function handleInputCommands(string $input): void
	{
		switch ($input) {
			case 'status':
				$this->serverStatus();
				break;

			case 'restart':
				$this->stopServer();
				$this->startServer();
				break;

			case 'help':
				output("\nAvailable commands:\n");
				$this->showCommands();
				break;

			default:
				output("Unknown command: $input\n");
				output("Type 'help' for a list of available commands.\n");
				break;
		}
	}
}
