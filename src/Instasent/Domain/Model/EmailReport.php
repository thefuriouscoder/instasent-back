<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 1:27
 */

namespace App\Instasent\Domain\Model;


use App\Instasent\Domain\Event\EmailReportWasCreated;

class EmailReport extends Report
{
	/**
	 * @var string
	 */
	private $client;

	/**
	 * @var string
	 */
	private $OS;

	/**
	 * EmailReport constructor.
	 *
	 * @param string $reportId
	 * @param string $reference
	 * @param string $status
	 * @param \DateTime $timestamp
	 * @param string $client
	 * @param string $OS
	 */
	private function __construct( string $reportId, string $reference, string $status, \DateTime $timestamp, string $client, string $OS )
	{
		$this->reportId  = $reportId;
		$this->reference = $reference;
		$this->status    = $status;
		$this->timestamp = $timestamp;
		$this->client    = $client;
		$this->OS        = $OS;
	}

	protected static function createEmptyReportWith($reportId)
	{
		return new EmailReport(
			$reportId,
			'',
			'',
			null,
			'',
			''
		);
	}

	public static function create($reportId, $reference, $status, $timestamp, $client, $OS)
	{
		$report = new EmailReport($reportId, $reference, $status, $timestamp, $client, $OS);
		$report->recordThat(
			new EmailReportWasCreated($reportId, $reference, $status, $timestamp, $client, $OS)
		);

		return $report;

	}

	protected function applyEmailReportWasCreated(EmailReportWasCreated $event)
	{
		$this->reference = $event->getReference();
		$this->status    = $event->getStatus();
		$this->timestamp = $event->getTimestamp();
		$this->client    = $event->getClient();
		$this->OS        = $event->getOS();


	}



}