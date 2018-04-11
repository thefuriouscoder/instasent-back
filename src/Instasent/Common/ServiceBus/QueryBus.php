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

class QueryBus
{
	private $queryHandlers = [];

	public function handle($query) {
		$queryClass = ClassFunctions::underscore($query);
		if (!isset($this->queryHandlers[$queryClass])) {
			throw new HandlerNotFoundException(get_class($query));
		}

		$queryHandler = $this->queryHandlers[$queryClass];
		return $queryHandler->handle($query);

	}

	public function register($queryHandler) {
		$queryHandlerClass = ClassFunctions::underscore($queryHandler);

		$aQueryClass = str_replace(
			['.handler', '_handler'],
			['', '' ],
			$queryHandlerClass
		);

		$this->queryHandlers[$aQueryClass] = $queryHandler;

	}

}