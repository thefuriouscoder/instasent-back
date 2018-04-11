<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 0:19
 */

namespace App\Instasent\Common\Domain;

use Buttercup\Protects\DomainEvents;

interface Projection
{
	public function project(DomainEvents $eventStream);
}