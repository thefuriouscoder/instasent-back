<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 23:55
 */

namespace App\Instasent\Infrastructure\Persistence\EventStore;


use Buttercup\Protects\AggregateHistory;
use Buttercup\Protects\DomainEvents;
use Buttercup\Protects\IdentifiesAggregate;

interface EventStore
{
	/**
	 * @param DomainEvents $events
	 *
	 * @return void
	 */
	public function commit(DomainEvents $events);
	/**
	 * @param IdentifiesAggregate $id
	 *
	 * @return AggregateHistory
	 */
	public function getAggregateHistoryFor(IdentifiesAggregate $id);
}