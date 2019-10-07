<?php
declare(strict_types = 1);

namespace Mireiawen\Messages\Message;

use MyCLabs\Enum\Enum;

/**
 * Message levels
 *
 * @package Mireiawen\Messages\Message
 */
class Level extends Enum
{
	private const ERROR = E_USER_ERROR;
	private const WARNING = E_USER_WARNING;
	private const NOTICE = E_USER_NOTICE;
	private const INFO = -8;
	private const SUCCESS = -16;
	private const DEBUG = -32;
	
	/**
	 * Get the message level ERROR
	 *
	 * @return Level
	 */
	public static function ERROR() : self
	{
		return new self(self::ERROR);
	}
	
	/**
	 * Get the message level WARNING
	 *
	 * @return Level
	 */
	public static function WARNING() : self
	{
		return new self(self::WARNING);
	}
	
	/**
	 * Get the message level NOTICE
	 *
	 * @return Level
	 */
	public static function NOTICE() : self
	{
		return new self(self::NOTICE);
	}
	
	/**
	 * Get the message level INFO
	 *
	 * @return Level
	 */
	public static function INFO() : self
	{
		return new self(self::INFO);
	}
	
	/**
	 * Get the message level SUCCESS
	 *
	 * @return Level
	 */
	public static function SUCCESS() : self
	{
		return new self(self::SUCCESS);
	}
	
	/**
	 * Get the message level DEBUG
	 *
	 * @return Level
	 */
	public static function DEBUG() : self
	{
		return new self(self::DEBUG);
	}
}