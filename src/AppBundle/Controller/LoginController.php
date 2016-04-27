<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Response;

use Symfony\Component\HttpFoundation\Request;


class LoginController extends Controller
{
	 /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        if ($this->getUser()) {
            // User is logged in, redirect to the homepage
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

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(Request $request)
    {
        if ($this->getUser()) {
            // user is logged in, destroy session and redirect to the logout
            $session =$request->getSession();
            $session->clear();

            return $this->redirectToRoute('homepage');
        }
    }
}