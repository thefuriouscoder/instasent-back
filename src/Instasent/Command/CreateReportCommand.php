<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 0:22
 */

namespace App\Instasent\Command;


abstract class CreateReportCommand
{

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