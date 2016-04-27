<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // Get the Doctrine entity manager
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository(Contact::class)->findAll();

        return $this->render('default/index.html.twig', ['contacts' => $contacts]);
    }
}