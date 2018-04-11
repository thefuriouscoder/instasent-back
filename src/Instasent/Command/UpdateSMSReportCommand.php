<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 0:36
 */

namespace App\Instasent\Command;


class UpdateSMSReportCommand extends UpdateReportCommand
{
	/**
	 * @var string
	 */
	private $network;

	/**
	 * @return string
	 */
	public function getNetwork(): string {
		return $this->network;
	}

}