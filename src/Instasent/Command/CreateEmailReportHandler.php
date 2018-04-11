<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 23:12
 */

namespace App\Instasent\Command;


use App\Instasent\Domain\Model\EmailReport;
use App\Instasent\Domain\ReportId;
use App\Instasent\Domain\ReportRepository;

class CreateEmailReportHandler
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

	public function handle(CreateEmailReportCommand $createReportCommand)
	{
		$newReport = EmailReport::create(
			ReportId::generate(),
			$createReportCommand->getReference(),
			$createReportCommand->getStatus(),
			$createReportCommand->getTimestamp(),
			$createReportCommand->getClient(),
			$createReportCommand->getOS()
		);

		$this->reportRepository->add($newReport);
	}
}