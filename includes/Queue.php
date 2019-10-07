<?php
declare(strict_types = 1);

namespace Mireiawen\Messages;

/**
 * Message queue
 *
 * @package Mireiawen\Messages
 */
class Queue
{
	/**
	 * The stored messages
	 *
	 * @var Message[]
	 */
	protected $messages = [];
	
	/**
	 * The session key used to store the messages
	 *
	 * @var string
	 */
	protected $session_key = '';
	
	/**
	 * Read the existing messages from session, if they are set
	 *
	 * @param string $session_key
	 *    The session key to store the messages to
	 *
	 * @throws \Exception
	 *    In case of session related errors
	 */
	public function __construct(string $session_key = 'messages')
	{
		// Read the existing messages from the session
		if (empty(\session_id()))
		{
			throw new \Exception(\sprintf(\_('The session is not available')));
		}
		
		if (isset($_SESSION[$session_key]))
		{
			$this->messages = \unserialize($_SESSION[$session_key]);
			if (!\is_array($this->messages))
			{
				unset($_SESSION[$session_key]);
				$this->messages = [];
				throw new \Exception(\sprintf(\_('Invalid message data in session key %s'), $session_key));
			}
		}
		
		$this->session_key = $session_key;
	}
	
	/**
	 * Store the current messages to the session
	 *
	 * @throws \Exception
	 *    If session is not started
	 */
	public function __destruct()
	{
		if (empty(\session_id()))
		{
			throw new \Exception(\sprintf(\_('The session is not available')));
		}
		
		$_SESSION[$this->session_key] = \serialize($this->messages);
	}
	
	/**
	 * Add message to the queue
	 *
	 * @param Message $message
	 *    The message to add
	 */
	public function Add(Message $message) : void
	{
		\array_push($this->messages, $message);
	}
	
	/**
	 * Get the first message from the queue
	 *
	 * @param bool $remove
	 *    TRUE to remove the message when getting it,
	 *    FALSE to keep it
	 *
	 * @return Message
	 *    The message from the queue
	 */
	public function Get(bool $remove = TRUE) : Message
	{
		if ($remove)
		{
			return \array_shift($this->messages);
		}
		
		[$first] = $this->messages;
		return $first;
	}
	
	/**
	 * Get all of the messages from the queue
	 *
	 * @param bool $remove
	 *    TRUE to remove the messages when getting them
	 *    FALSE to keep them as they are
	 *
	 * @return Message[]
	 *    The message array
	 */
	public function GetAll(bool $remove = TRUE) : array
	{
		$messages = $this->messages;
		
		if ($remove)
		{
			$this->messages = [];
		}
		
		return $messages;
	}
	
	/**
	 * Get the number of messages in the queue
	 *
	 * @return int
	 *    Number of messages in the queue
	 */
	public function GetCount() : int
	{
		return \count($this->messages);
	}
}