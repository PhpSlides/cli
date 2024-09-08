<?php declare(strict_types=1);

class ColorCode implements ColorCodeInterface
{
	const START = "\033[";
	const RESET = "\033[0m";
	const BOLD = 1;
	const UNDERLINE = 4;
	# COLORS
	const BLACK = 30;
	const RED = 31;
	const GREEN = 32;
	const YELLOW = 33;
	const BLUE = 34;
	const MAGENTA = 35;
	const CYAN = 36;
	const WHITE = 37;
	# BACKGROUND COLORS
	const BG_BLACK = 40;
	const BG_RED = 41;
	const BG_GREEN = 42;
	const BG_YELLOW = 43;
	const BG_BLUE = 44;
	const BG_MAGENTA = 45;
	const BG_CYAN = 46;
	const BG_WHITE = 47;
}