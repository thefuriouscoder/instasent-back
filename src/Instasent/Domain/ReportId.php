<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 4/04/18
 * Time: 1:51
 */

namespace App\Instasent\Domain;


use Buttercup\Protects\IdentifiesAggregate;
use Ramsey\Uuid\Uuid;

class ReportId implements IdentifiesAggregate
{
	private $reportId;

	public function __construct ($reportId) {
		$this->reportId = $reportId;

	}

	/**
	 * @param $reportId
	 *
	 * @return ReportId|IdentifiesAggregate
	 */
	public static function fromString( $reportId ) {
		return new ReportId($reportId);

	}

	public function __toString() {
		return (string) $this->reportId;

	}

	public function equals( IdentifiesAggregate $other ) {
		return $other instanceof ReportId && $this->reportId === $other->reportId;

	}

	public static function generate()
	{
		return new ReportId((string) Uuid::uuid1());

	}
}