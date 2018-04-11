<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 2:21
 */

namespace App\Instasent\Domain\View;


class EmailReportView
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
	private $client;

	/**
	 * @var string
	 */
	private $OS;

	/**
	 * EmailReportView constructor.
	 *
	 * @param string $reportId
	 * @param string $reference
	 * @param string $status
	 * @param \DateTime $timestamp
	 * @param string $client
	 * @param string $OS
	 */
	public function __construct( string $reportId, string $reference, string $status, \DateTime $timestamp, string $client, string $OS ) {
		$this->reportId  = $reportId;
		$this->reference = $reference;
		$this->status    = $status;
		$this->timestamp = $timestamp;
		$this->client    = $client;
		$this->OS        = $OS;
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