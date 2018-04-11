<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 3/04/18
 * Time: 23:34
 */

namespace App\Instasent\Infrastructure\Rest\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MessageController extends Controller {

	/**
	 * @Route("/message/{messageId}", name="get_message",methods={"GET"})
	 * @param int $messageId
	 * @param Request $request
	 */
	public function showMessage(int $messageId, Request $request)
	{
		$dm = $this->get('doctrine_mongodb')->getManager();
	}

}