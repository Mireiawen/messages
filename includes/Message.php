<?php
declare(strict_types = 1);

namespace Mireiawen\Messages;

use Mireiawen\Messages\Message\Level;

/**
 * The message that is stored in the queue
 *
 * @package Mireiawen\Messages
 */
class Message
{
	/**
	 * The message level
	 *
	 * @var Level
	 */
	protected $level;
	
	/**
	 * The message code
	 *
	 * @var int
	 */
	protected $code;
	
	/**
	 * The message itself
	 *
	 * @var string
	 */
	protected $message;
	
	/**
	 * Create a message
	 *
	 * @param string $message
	 *    The message itself
	 *
	 * @param int $code
	 *    The message code
	 *
	 * @param Level $level
	 *    The message level
	 */
	public function __construct(string $message, int $code, Level $level)
	{
		$this->level = $level;
		$this->code = $code;
		$this->message = $message;
	}
	
	/**
	 * Get the message level
	 *
	 * @return Level
	 *    The message level
	 */
	public function GetLevel() : Level
	{
		return $this->level;
	}
	
	/**
	 * Get the message code
	 *
	 * @return int
	 *    The message code
	 */
	public function GetCode() : int
	{
		return $this->code;
	}
	
	/**
	 * Get the message itself
	 *
	 * @return string
	 *    The message
	 */
	public function GetMessage() : string
	{
		return $this->message;
	}
}