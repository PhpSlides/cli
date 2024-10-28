<?php declare(strict_types=1);

namespace PhpSlides\Interface;

/**
 * Interface ConsoleInterface
 *
 * This interface defines the methods required for managing console commands.
 */
interface ConsoleInterface
{
	/**
	 * Resolve the path for the server.
	 *
	 * @param string $baseDir The project root directory path.
	 * @return self
	 */
	public function resolve(string $baseDir): self;

	/**
	 * Set the host and port for the server to listen on.
	 *
	 * @param string $host The hostname.
	 * @param int $port The port number.
	 * @return self
	 */
	public function listen(string $host, int $port): self;

	/**
	 * Enable or disable debug mode.
	 *
	 * @param bool $is_debug True to enable debug mode, false to disable.
	 * @return self
	 */
	public function debug(bool $is_debug): self;
}
