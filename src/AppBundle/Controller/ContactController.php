<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
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
	 * @Route("/contact/{id}", name="contact_page", requirements={"id": "\d+"})
 	 * @Method({"GET"})
	 */
    public function showAction($id)
    {
        // Get the Doctrine entity manager
        $em = $this->getDoctrine()->getManager();

        $contact = $em->getRepository(Contact::class)->find($id);

        return $this->render(
            'contact/show.html.twig', ['contact' => $contact]
        );
    }
}