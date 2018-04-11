<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 3/04/18
 * Time: 23:50
 */

namespace App\Instasent\Common\ServiceBus;


use App\Instasent\Common\ServiceBus\Exception\HandlerNotFoundException;
use Verraes\ClassFunctions\ClassFunctions;

class CommandBus
{
	private $commandHandlers = [];

	public function handle($command)
	{
		$commandClass = ClassFunctions::underscore($command);

		if (!isset($this->commandHandlers[$commandClass])) {
			throw new HandlerNotFoundException(get_class($command));
		}

		$commandHandler = $this->commandHandlers[$commandClass];
		$commandHandler->handle($command);
	}

	public function register($commandHandler)
	{
		$commandClass = str_replace(
			['.handler','_handler'],
			['','_command'],
			ClassFunctions::underscore($commandHandler)
		);

		$this->commandHandlers[$commandClass] = $commandHandler;
	}

}