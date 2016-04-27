<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class ContactController
 * Manages Contacts
 *
 */
class ContactController extends Controller
{
	/**
	 * @Route("/contact", name="contacts")
 	 * @Method({"GET"})
	 */
    public function showAction(Request $request)
    {
        return $this->render(
            'contact/show.html.twig'
        );
    }
}