<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 1:43
 */

namespace App\Instasent\Domain\Model;


use App\Instasent\Domain\Event\SMSReportWasCreated;

class SMSReport extends Report
{
	/**
	 * @var string
	 */
	private $network;

	/**
	 * EmailReport constructor.
	 *
	 * @param string $reportId
	 * @param string $reference
	 * @param string $status
	 * @param \DateTime $timestamp
	 * @param string $network
	 */
	private function __construct( string $reportId, string $reference, string $status, \DateTime $timestamp, string $network)
	{
		$this->reportId  = $reportId;
		$this->reference = $reference;
		$this->status    = $status;
		$this->timestamp = $timestamp;
		$this->network    = $network;
	}

	protected static function createEmptyReportWith($reportId)
	{
		return new SMSReport(
			$reportId,
			'',
			'',
			null,
			''
		);
	}

	public static function create($reportId, $reference, $status, $timestamp, $network)
	{
		$report = new SMSReport($reportId, $reference, $status, $timestamp,$network);
		$report->recordThat(
			new SMSReportWasCreated($reportId, $reference, $status, $timestamp, $network)
		);

		return $report;

	}

	protected function applySMSReportWasCreated(SMSReportWasCreated $event)
	{
		$this->reference = $event->getReference();
		$this->status    = $event->getStatus();
		$this->timestamp = $event->getTimestamp();
		$this->network   = $event->getNetwork();

	}


}