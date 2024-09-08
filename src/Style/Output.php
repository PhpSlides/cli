<?php declare(strict_types=1);

/**
 * Display output on the Console in some intervals
 *
 * @param string $message The message to display on the console.
 */
function output(string $message): void
{
	for ($i = 0; $i < strlen($message); $i++) {
		usleep(5000);
		echo $message[$i];
	}
}
