<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Request;


class LoginController extends Controller
{
	 /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        if ($this->getUser()) {
            // we have logged in, redirect to the homepage
            return $this->redirectToRoute('homepage');
        }

    	 $authenticationUtils = $this->get('security.authentication_utils');

    	 $error = $authenticationUtils->getLastAuthenticationError();
       
    	 $lastUsername = $authenticationUtils->getLastUsername();

    	 return $this->render(
        'security/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }
}