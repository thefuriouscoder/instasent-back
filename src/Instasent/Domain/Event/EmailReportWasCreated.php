<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 1:56
 */

namespace App\Instasent\Domain\Event;

use App\Instasent\Domain\ReportId;
use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IdentifiesAggregate;

class EmailReportWasCreated implements DomainEvent
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
	private $client;

	/**
	 * @var string
	 */
	private $OS;

	/**
	 * EmailReportWasCreated constructor.
	 *
	 * @param string $aggregateId
	 * @param string $reference
	 * @param string $status
	 * @param \DateTime $timestamp
	 * @param string $client
	 * @param string $OS
	 */
	public function __construct( string $aggregateId, string $reference, string $status, \DateTime $timestamp, string $client, string $OS )
	{
		$this->reportId  = $aggregateId;
		$this->reference = $reference;
		$this->status    = $status;
		$this->timestamp = $timestamp;
		$this->client    = $client;
		$this->OS        = $OS;

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
	public function getClient(): string {
		return $this->client;
	}

	/**
	 * @return string
	 */
	public function getOS(): string {
		return $this->OS;
	}


}