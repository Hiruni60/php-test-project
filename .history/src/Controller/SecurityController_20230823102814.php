<?php  
    namespace App\Controller\SecurityController;

    use App\Security\Authenticator\ExampleAuthenticator;
    use Symfony\Bundle\SecurityBundle\Security;
    
    class SecurityController
    {
        public function someAction(Security $security): Response
        {
            // get the user to be authenticated
            $user = ...;
    
            // log the user in on the current firewall
            $security->login($user);
    
            // if the firewall has more than one authenticator, you must pass it explicitly
            // by using the name of built-in authenticators...
            $security->login($user, 'form_login');
            // ...or the service id of custom authenticators
            $security->login($user, ExampleAuthenticator::class);
    
            // you can also log in on a different firewall
            $security->login($user, 'form_login', 'other_firewall');
    
            // use the redirection logic applied to regular login
            $redirectResponse = $security->login($user);
            return $redirectResponse;
    
            // or use a custom redirection logic (e.g. redirect users to their account page)
            // return new RedirectResponse('...');
        }
    }
?>