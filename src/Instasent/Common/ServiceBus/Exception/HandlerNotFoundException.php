<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 3/04/18
 * Time: 23:50
 */

namespace App\Instasent\Common\ServiceBus\Exception;

use Exception;


class HandlerNotFoundException extends Exception
{
	public function __construct( $queryClass ) {
		parent::__construct(sprintf('Unable to find a registered handler for "%s"', $queryClass), 0, null);
	}
}