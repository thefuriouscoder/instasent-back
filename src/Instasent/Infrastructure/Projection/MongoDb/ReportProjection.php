<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 23:28
 */

namespace App\Instasent\Infrastructure\Projection\MongoDb;


use App\Instasent\Domain\Event\EmailReportWasCreated;
use App\Instasent\Domain\Event\ReportStatusWasChanged;
use App\Instasent\Domain\Event\SMSReportWasCreated;
use App\Instasent\Infrastructure\Projection\BaseProjection;
use App\Instasent\Domain\ReportProjection as BaseReportProjection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

class ReportProjection extends BaseProjection implements BaseReportProjection
{

	/**
	 * @var \MongoCollection
	 */
	private $reportCollection;

	public function __construct($reportCollection)
	{
		$this->reportCollection = $reportCollection;
	}

	public function projectEmailReportWasCreated( EmailReportWasCreated $event ) {
		// TODO: Implement projectEmailReportWasCreated() method.
	}

	public function projectSMSReportWasCreated( SMSReportWasCreated $event ) {
		// TODO: Implement projectSMSReportWasCreated() method.
	}

	public function projectReportStatusWasChanged( ReportStatusWasChanged $event ) {
		// TODO: Implement projectReportStatusWasChanged() method.
	}
}