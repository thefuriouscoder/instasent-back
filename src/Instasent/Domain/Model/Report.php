<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 0:38
 */

namespace App\Instasent\Domain\Model;

use App\Instasent\Domain\Event\ReportStatusWasChanged;
use App\Instasent\Domain\ReportId;
use Buttercup\Protects\AggregateHistory;
use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\DomainEvents;
use Buttercup\Protects\IsEventSourced;
use Buttercup\Protects\RecordsEvents;
use Verraes\ClassFunctions\ClassFunctions;

abstract class Report implements RecordsEvents, IsEventSourced
{
	const STATE_ENQUEUED = 'enqueued';
	const STATE_DELIVERED = 'delivered';
	const STATE_UNDELIVERED = 'undelivered';
	const STATE_OPENED = 'opened';
	const STATE_BOUNCED = 'bounced';
	const STATE_FAILED = 'failed';
	const STATE_SENT = 'sent';

	/**
	 * @var ReportId
	 */
	protected $reportId;

	/**
	 * @var string
	 */
	protected $reference;

	/**
	 * @var string
	 */
	protected $status;

	/**
	 * @var \DateTime
	 */
	protected $timestamp;

	/**
	 * @var DomainEvent[]
	 */
	private $recordedEvents = [];

	/**
	 * @param $reportId
	 *
	 * @return EmailReport|SMSReport
	 */
	abstract protected static function createEmptyReportWith($reportId);

	/**
	 * Get all the Domain Events that were recorded since the last time it was cleared, or since it was
	 * restored from persistence. This does not include events that were recorded prior.
	 *
	 * @return DomainEvents
	 */
	public function getRecordedEvents()
	{
		return new DomainEvents($this->recordedEvents);
	}

	/**
	 * Clears the record of new Domain Events. This doesn't clear the history of the object.
	 * @return void
	 */
	public function clearRecordedEvents()
	{
		$this->recordedEvents = [];
	}


	public static function reconstituteFrom( AggregateHistory $aggregateHistory )
	{
		$report = static::createEmptyReportWith($aggregateHistory->getAggregateId());
		foreach ($aggregateHistory as $event) {
			$report->apply($event);
		}

	}

	public function changeStatus($status)
	{
		$this->applyAndRecordThat(
			new ReportStatusWasChanged($this->reportId,$status)
		);

	}

	protected function apply($event)
	{
		$method = 'apply' . ClassFunctions::short($event);
		$this->$method($event);

	}

	protected function recordThat(DomainEvent $domainEvent)
	{
		$this->recordedEvents[] = $domainEvent;

	}

	protected function applyAndRecordThat(DomainEvent $domainEvent)
	{
		$this->recordThat($domainEvent);
		$this->apply($domainEvent);
	}


	protected function applyReportStatusWasChanged(ReportStatusWasChanged $event)
	{
		$this->status = $event->getStatus();
	}

}