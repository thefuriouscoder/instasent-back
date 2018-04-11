<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 5/04/18
 * Time: 1:25
 */

namespace App\Instasent\Infrastructure\Persistence\MongoDb;

use App\Instasent\Domain\View\SMSReportView;
use App\Instasent\Domain\View\SMSReportViewRepository as BaseReportViewRepository;
use MongoCollection;

class SMSReportViewRepository implements BaseReportViewRepository{
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
	 * @return SMSReportView
	 */
	public function get( $id )
	{
		$rawReport = $this->collection->findOne(["report_id" => $id]);
		return $this->newReportView($rawReport);

	}

	/**
	 * @return SMSReportView[]
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
	 * @return SMSReportView
	 */
	private function newReportView($rawReport)
	{
		return new SMSReportView(
			$rawReport['report_id'],
			$rawReport['reference'],
			$rawReport['status'],
			$rawReport['timestamp'],
			$rawReport['network']
		);
	}

}