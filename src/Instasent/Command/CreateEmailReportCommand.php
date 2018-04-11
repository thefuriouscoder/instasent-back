<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 0:27
 */

namespace App\Instasent\Command;


class CreateEmailReportCommand extends CreateReportCommand
{
	/**
	 * @var string
	 */
	private $client;

	/**
	 * @var string
	 */
	private $OS;

	public function __construct(string $reference, string $status, \DateTime $timestamp, string $client, string $OS)
	{
		$this->reference = $reference;
		$this->status = $status;
		$this->timestamp = $timestamp;
		$this->client = $client;
		$this->OS = $OS;
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