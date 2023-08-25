<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(Request $request,AuthenticationUtils $authenticationUtils,UserPasswordEncoderInterFace $passwordEncoder): Response
    {
         // If user is already logged in, redirect them to the home page
         if ($this->getUser()) {
            return $this->redirectToRoute('blog_'); // Replace 'home' with your actual home route name
        }


        // get the login error if there is one
         $error = $authenticationUtils->getLastAuthenticationError();
          // last username entered by the user
         $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
             'error'         => $error,
        ]);
    }
}
