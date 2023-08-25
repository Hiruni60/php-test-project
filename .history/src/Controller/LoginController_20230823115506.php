<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\SecurityBundle\Security;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(Request $request,AuthenticationUtils $authenticationUtils):Response
    {
         // If user is already logged in, redirect them to the home page
         if ($this->getUser()) {
            return $this->redirectToRoute('blog_create'); // Replace 'home' with your actual home route name
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

    #[Route('/l', name: 'app_login')]
    public function logOutAction(Security $security): Response
    {
        // logout the user in on the current firewall
        $response = $security->logout();

        // you can also disable the csrf logout
        $response = $security->logout(false);

        // ... return $response (if set) or e.g. redirect to the homepage
    }
}
