<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 5/04/18
 * Time: 1:14
 */

namespace App\Instasent\Domain\View;


interface SMSReportViewRepository {
	/**
	 * @param $id
	 *
	 * @return SMSReportView
	 */
	public function get ($id);

	/**
	 * @return SMSReportView[]
	 */
	public function all();

}