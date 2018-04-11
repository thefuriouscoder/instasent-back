<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 0:29
 */

namespace App\Instasent\Command;


class CreateSMSReportCommand extends CreateReportCommand
{
	/**
	 * @var string
	 */
	private $network;


	public function __construct(string $reference, string $status, \DateTime $timestamp, string $network)
	{
		$this->reference = $reference;
		$this->status = $status;
		$this->timestamp = $timestamp;
		$this->network = $network;
	}

	/**
	 * @return string
	 */
	public function getNetwork(): string {
		return $this->network;
	}


}