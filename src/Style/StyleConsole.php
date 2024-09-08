<?php declare(strict_types=1);

/**
 * Console class provides methods to style console output with various text and background colors.
 */
class StyleConsole extends ColorCode implements
	ColorCodeInterface,
	StyleConsoleInterface
{
	/**
	 * Applies one or more color codes to a given message.
	 *
	 * @param string $message The message to be styled.
	 * @param int ...$codes One or more color codes to be applied.
	 * @return string The styled message.
	 */
	public static function text(string $message, int ...$codes): string
	{
		$code = implode(';', $codes);
		return parent::START . $code . 'm' . $message . parent::RESET;
	}

	/**
	 * Applies bold formatting to a given message.
	 *
	 * @param string $message The message to be bolded.
	 * @return string The bolded message.
	 */
	public static function bold(string $message): string
	{
		return self::text($message, parent::BOLD);
	}

	/**
	 * Applies underline formatting to a given message.
	 *
	 * @param string $message The message to be underlined.
	 * @return string The underlined message.
	 */
	public static function underline(string $message): string
	{
		return self::text($message, parent::UNDERLINE);
	}

	/**
	 * Colors the message with black text.
	 *
	 * @param string $message The message to be colored.
	 * @return string The colored message.
	 */
	public static function black(string $message): string
	{
		return self::text($message, parent::BLACK);
	}

	/**
	 * Colors the message with red text.
	 *
	 * @param string $message The message to be colored.
	 * @return string The colored message.
	 */
	public static function red(string $message): string
	{
		return self::text($message, parent::RED);
	}

	/**
	 * Colors the message with green text.
	 *
	 * @param string $message The message to be colored.
	 * @return string The colored message.
	 */
	public static function green(string $message): string
	{
		return self::text($message, parent::GREEN);
	}

	/**
	 * Colors the message with yellow text.
	 *
	 * @param string $message The message to be colored.
	 * @return string The colored message.
	 */
	public static function yellow(string $message): string
	{
		return self::text($message, parent::YELLOW);
	}

	/**
	 * Colors the message with blue text.
	 *
	 * @param string $message The message to be colored.
	 * @return string The colored message.
	 */
	public static function blue(string $message): string
	{
		return self::text($message, parent::BLUE);
	}

	/**
	 * Colors the message with magenta text.
	 *
	 * @param string $message The message to be colored.
	 * @return string The colored message.
	 */
	public static function magenta(string $message): string
	{
		return self::text($message, parent::MAGENTA);
	}

	/**
	 * Colors the message with cyan text.
	 *
	 * @param string $message The message to be colored.
	 * @return string The colored message.
	 */
	public static function cyan(string $message): string
	{
		return self::text($message, parent::CYAN);
	}

	/**
	 * Colors the message with white text.
	 *
	 * @param string $message The message to be colored.
	 * @return string The colored message.
	 */
	public static function white(string $message): string
	{
		return self::text($message, parent::WHITE);
	}

	/**
	 * Colors the message with a black background.
	 *
	 * @param string $message The message to be styled.
	 * @return string The styled message.
	 */
	public static function bgBlack(string $message): string
	{
		return self::text($message, parent::BG_BLACK);
	}

	/**
	 * Colors the message with a red background.
	 *
	 * @param string $message The message to be styled.
	 * @return string The styled message.
	 */
	public static function bgRed(string $message): string
	{
		return self::text($message, parent::BG_RED);
	}

	/**
	 * Colors the message with a green background.
	 *
	 * @param string $message The message to be styled.
	 * @return string The styled message.
	 */
	public static function bgGreen(string $message): string
	{
		return self::text($message, parent::BG_GREEN);
	}

	/**
	 * Colors the message with a yellow background.
	 *
	 * @param string $message The message to be styled.
	 * @return string The styled message.
	 */
	public static function bgYellow(string $message): string
	{
		return self::text($message, parent::BG_YELLOW);
	}

	/**
	 * Colors the message with a blue background.
	 *
	 * @param string $message The message to be styled.
	 * @return string The styled message.
	 */
	public static function bgBlue(string $message): string
	{
		return self::text($message, parent::BG_BLUE);
	}

	/**
	 * Colors the message with a magenta background.
	 *
	 * @param string $message The message to be styled.
	 * @return string The styled message.
	 */
	public static function bgMagenta(string $message): string
	{
		return self::text($message, parent::BG_MAGENTA);
	}

	/**
	 * Colors the message with a cyan background.
	 *
	 * @param string $message The message to be styled.
	 * @return string The styled message.
	 */
	public static function bgCyan(string $message): string
	{
		return self::text($message, parent::BG_CYAN);
	}

	/**
	 * Colors the message with a white background.
	 *
	 * @param string $message The message to be styled.
	 * @return string The styled message.
	 */
	public static function bgWhite(string $message): string
	{
		return self::text($message, parent::BG_WHITE);
	}
}
