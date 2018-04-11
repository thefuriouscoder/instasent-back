<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 2:18
 */

namespace App\Instasent\Domain;


use App\Instasent\Common\Domain\Projection;
use App\Instasent\Domain\Event\EmailReportWasCreated;
use App\Instasent\Domain\Event\ReportStatusWasChanged;
use App\Instasent\Domain\Event\SMSReportWasCreated;

interface ReportProjection extends Projection
{
	public function projectEmailReportWasCreated(EmailReportWasCreated $event);

	public function projectSMSReportWasCreated(SMSReportWasCreated $event);

	public function projectReportStatusWasChanged(ReportStatusWasChanged $event);
}