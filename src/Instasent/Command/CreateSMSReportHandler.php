<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 23:19
 */

namespace App\Instasent\Command;

use App\Instasent\Domain\Model\SMSReport;
use App\Instasent\Domain\ReportId;
use App\Instasent\Domain\ReportRepository;

class CreateSMSReportHandler
{
	/**
	 * @var ReportRepository
	 */
	private $reportRepository;

	/**
	 * CreateReportHandler constructor.
	 *
	 * @param ReportRepository $reportRepository
	 */
	public function __construct($reportRepository)
	{
		$this->reportRepository = $reportRepository;
	}

	public function handle(CreateSMSReportCommand $createReportCommand)
	{
		$newReport = SMSReport::create(
			ReportId::generate(),
			$createReportCommand->getReference(),
			$createReportCommand->getStatus(),
			$createReportCommand->getTimestamp(),
			$createReportCommand->getNetwork()
		);

		$this->reportRepository->add($newReport);
	}


}