<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 2:21
 */

namespace App\Instasent\Domain\View;


class SMSReportView
{
	/**
	 * @var string
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
	 * SMSReportView constructor.
	 *
	 * @param string $reportId
	 * @param string $reference
	 * @param string $status
	 * @param \DateTime $timestamp
	 * @param string $network
	 */
	public function __construct( string $reportId, string $reference, string $status, \DateTime $timestamp, string $network ) {
		$this->reportId  = $reportId;
		$this->reference = $reference;
		$this->status    = $status;
		$this->timestamp = $timestamp;
		$this->network   = $network;
	}

	/**
	 * @return string
	 */
	public function getReportId(): string {
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