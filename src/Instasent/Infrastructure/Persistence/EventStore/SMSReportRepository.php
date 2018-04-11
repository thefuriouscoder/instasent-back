<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 5/04/18
 * Time: 0:02
 */

namespace App\Instasent\Infrastructure\Persistence\EventStore;

use App\Instasent\Domain\Model\SMSReport;
use App\Instasent\Domain\ReportProjection;
use App\Instasent\Domain\ReportRepository as BaseReportRepository;
use Buttercup\Protects\IdentifiesAggregate;
use Buttercup\Protects\IsEventSourced;
use Buttercup\Protects\RecordsEvents;

class SMSReportRepository implements BaseReportRepository {

	/**
	 * @var EventStore
	 */
	private $eventStore;

	/**
	 * @var ReportProjection
	 */
	private $reportProjection;

	/**
	 * ReportRepository constructor.
	 *
	 * @param $eventStore
	 * @param $reportProjection
	 */
	public function __construct(EventStore $eventStore, ReportProjection $reportProjection)
	{
		$this->eventStore = $eventStore;
		$this->reportProjection = $reportProjection;

	}

	/**
	 * @param IdentifiesAggregate $aggregateId
	 *
	 * @return IsEventSourced
	 */
	public function get( IdentifiesAggregate $aggregateId )
	{
		$eventStream = $this->eventStore->getAggregateHistoryFor($aggregateId);

		return SMSReport::reconstituteFrom($eventStream);
	}

	/**
	 * @param RecordsEvents $aggregate
	 *
	 * @return void
	 */
	public function add( RecordsEvents $aggregate ) {
		$events = $aggregate->getRecordedEvents();
		$this->eventStore->commit($events);
		$this->reportProjection->project($events);

		$aggregate->clearRecordedEvents();
	}

}