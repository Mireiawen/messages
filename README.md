# Messages
Handle messages in session specific queue

* Class names: `Queue`, `Message`, `Message\Level`
* Namespace: `Mireiawen\Messages`

## Requirements
* Intl extension
* PHP 7

## Installation
You can clone or download the code from the [GitHub repository](https://github.com/Mireiawen/messages) or you can use composer: `composer require mireiawen/messages`

## Methods

### Class Queue
The message queue class.

#### __construct
    Queue::__construct(string $session_key)

Queue class constructor, prepares the queue and reads any existing messages from the session.

##### Arguments
* **string** `$session_key` - The key in the session to store the messages to

##### Exceptions thrown
###### \Exception
* In case session is not available
* In case session key contains invalid data

#### __destruct()
    Queue::__destruct()

Queue class destructor, stores the current queue to the session

##### Exceptions thrown
###### \Exception
* In case session is not available

#### Add
    Queue::Add(Message $message)

Add a message to the queue

##### Arguments
* **Message** `$message` - The message to add

#### Get
    Queue::Get(bool $remove)

Get the first message from the queue

##### Arguments
* **bool** `$remove` - TRUE to remove the message from the queue, FALSE to keep it

##### Return value
* **Message** - the message itself

#### GetAll
    Queue::GetAll(bool $remove)

Get all of the messages from the queue

##### Arguments
* **bool** `$remove` - TRUE to remove the messages from the queue, FALSE to keep them

##### Return value
* **Message[]** - the messages

#### GetCount
    Queue::GetCount()

Get the number of messages in the queue

##### Return value
* **int** - the number of messages in the queue

### Class Message
The message class.

#### __construct
    Message::__construct(string $message, int $code, Level $level)

Create a message

##### Arguments
* **string** `$message` - The message itself
* **int** `$code` - The message code
* **Level** `$level` - The message level
	
#### GetLevel
    Message::GetLevel()

Get the message level

##### Return value
* **Level** - The message level
	
#### GetCode
    Message::GetCode()

Get the message code

##### Return value
* **int** - The message code

#### GetMessage
    Message::GetMessage()

Get the message itself

##### Return value
* **string** - The message

### Class Level
The message levels enumeration. See [PHP Enumerations](https://github.com/myclabs/php-enum) for more information

#### Levels
* ERROR
* WARNING
* NOTICE
* INFO
* SUCCESS
* DEBUG
