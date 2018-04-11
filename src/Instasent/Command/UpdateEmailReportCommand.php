<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 0:35
 */

namespace App\Instasent\Command;


class UpdateEmailReportCommand extends UpdateReportCommand
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