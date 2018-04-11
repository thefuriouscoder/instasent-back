<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 2:01
 */

namespace App\Instasent\Domain\Event;


use App\Instasent\Domain\ReportId;
use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IdentifiesAggregate;

class SMSReportWasCreated implements DomainEvent
{
	/**
	 * @var ReportId
	 */
	private $reportId;

	/**
	 * @var string
	 */
	private $reference;

	/**
	 * @var string
	 */
	private $status;

	/**
	 * @var \DateTime
	 */
	private $timestamp;

	/**
	 * @var string
	 */
	private $network;

	/**
	 * EmailReportWasCreated constructor.
	 *
	 * @param string $aggregateId
	 * @param string $reference
	 * @param string $status
	 * @param \DateTime $timestamp
	 * @param string $network
	 */
	public function __construct( string $aggregateId, string $reference, string $status, \DateTime $timestamp, string $network )
	{
		$this->reportId  = $aggregateId;
		$this->reference = $reference;
		$this->status    = $status;
		$this->timestamp = $timestamp;
		$this->network   = $network;

	}

	/**
	 * The Aggregate this event belongs to.
	 * @return IdentifiesAggregate
	 */
	public function getAggregateId(): string {
		return $this->reportId;
	}

	/**
	 * @return string
	 */
	public function getReference(): string {
		return $this->reference;
	}

	/**
	 * @return string
	 */
	public function getStatus(): string {
		return $this->status;
	}

	/**
	 * @return \DateTime
	 */
	public function getTimestamp(): \DateTime {
		return $this->timestamp;
	}

	/**
	 * @return string
	 */
	public function getNetwork(): string {
		return $this->network;
	}


}