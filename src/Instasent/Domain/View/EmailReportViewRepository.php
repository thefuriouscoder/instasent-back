<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 5/04/18
 * Time: 1:12
 */

namespace App\Instasent\Domain\View;


interface EmailReportViewRepository
{
	/**
	 * @param $id
	 *
	 * @return EmailReportView
	 */
	public function get ($id);

	/**
	 * @return EmailReportView[]
	 */
	public function all();
}