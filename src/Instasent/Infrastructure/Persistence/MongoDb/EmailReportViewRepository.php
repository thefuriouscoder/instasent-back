<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 5/04/18
 * Time: 1:10
 */

namespace App\Instasent\Infrastructure\Persistence\MongoDb;

use App\Instasent\Domain\View\EmailReportView;
use App\Instasent\Domain\View\EmailReportViewRepository as BaseReportViewRepository;
use MongoCollection;


class EmailReportViewRepository implements BaseReportViewRepository
{

	/**
	 * @var MongoCollection
	 */
	private $collection;


	public function __construct(MongoCollection $emailReportCollection)
	{
		$this->collection = $emailReportCollection;

	}

	/**
	 * @param $id
	 *
	 * @return EmailReportView
	 */
	public function get( $id )
	{
		$rawReport = $this->collection->findOne(["report_id" => $id]);
		return $this->newReportView($rawReport);

	}

	/**
	 * @return EmailReportView[]
	 */
	public function all()
	{
		$rawReports = $this->collection->find();
		$reports = [];

		foreach ($rawReports as $rawReport) {
			$reports[] = $this->newReportView($rawReport);
		}

		return $reports;
	}

	/**
	 * @param array $rawReport
	 *
	 * @return EmailReportView
	 */
	private function newReportView($rawReport)
	{
		return new EmailReportView(
			$rawReport['report_id'],
			$rawReport['reference'],
			$rawReport['status'],
			$rawReport['timestamp'],
			$rawReport['client'],
			$rawReport['OS']
		);
	}
}