<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 0:31
 */

namespace App\Instasent\Command;


abstract class UpdateReportCommand
{
	/**
	 * @var string
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

}