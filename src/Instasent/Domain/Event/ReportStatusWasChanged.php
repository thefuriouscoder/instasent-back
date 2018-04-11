<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 1:47
 */

namespace App\Instasent\Domain\Event;


use App\Instasent\Domain\ReportId;
use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IdentifiesAggregate;

class ReportStatusWasChanged implements DomainEvent
{
	/**
	 * @var ReportId
	 */
	private $reportId;

	/**
	 * @var string
	 */
	private $status;

	public function __construct(ReportId $reportId, $status)
	{
		$this->reportId = $reportId;
		$this->status = $status;

	}

	/**
	 * The Aggregate this event belongs to.
	 * @return IdentifiesAggregate
	 */
	public function getAggregateId() {
		return $this->reportId;

	}

	/**
	 * @return string
	 */
	public function getStatus()
	{
		return $this->status;
	}

}