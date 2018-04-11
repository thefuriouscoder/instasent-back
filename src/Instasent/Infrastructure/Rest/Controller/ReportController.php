<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 3/04/18
 * Time: 23:28
 */

namespace App\Instasent\Infrastructure\Rest\Controller;

use App\Instasent\Command\CreateEmailReportCommand;
use App\Instasent\Command\CreateSMSReportCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReportController extends Controller
{
	const REPORT_TYPE_SMS = 'sms';
	const REPORT_TYPE_EMAIL = 'email';

	/**
	 * @Route("/report/new/{type}",name="create_report", methods={"POST"})
	 * @param Request $request
	 * @param string $type
	 *
	 */
	public function create(Request $request, string $type) {

		$reference = $request->request->get('reference');
		$status = $request->request->get('status');
		$timestamp = $request->request->get('timestamp');

		if ($type === self::REPORT_TYPE_EMAIL) {
			$client = $request->request->get('client');
			$os = $request->request->get('os');

			$reportCommand = new CreateEmailReportCommand(
				$reference,
				$status,
				$timestamp,
				$client,
				$os
			);

		}

		if ($type === self::REPORT_TYPE_SMS) {
			$network = $request->request->get('network');

			$reportCommand = new CreateSMSReportCommand(
				$reference,
				$status,
				$timestamp,
				$network
			);

		}

		$this->get('command_bus')->handle($reportCommand);


	}

	/**
	 * @Route("/report/update/{reference}/{status}",name="update_report",methods={"PUT"})
	 * @param string $reference
	 * @param string$status
	 *
	 */
	public function update(string $reference, string $status) {

	}

}