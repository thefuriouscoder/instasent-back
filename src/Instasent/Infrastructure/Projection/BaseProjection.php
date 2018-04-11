<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 23:23
 */

namespace App\Instasent\Infrastructure\Projection;


use App\Instasent\Common\Domain\Projection;
use Buttercup\Protects\DomainEvents;
use Verraes\ClassFunctions\ClassFunctions;

abstract class BaseProjection implements Projection
{
	public function project( DomainEvents $eventStream ) {
		foreach ($eventStream as $event) {
			$projectMethod = 'project' . ClassFunctions::short($event);
			$this->$projectMethod($event);

		}
	}

}