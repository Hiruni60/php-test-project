<?php  
namespace pp\Service;

use Symfony\Bundle\SecurityBundle\Security;

class UserService{
    // Avoid calling getUser() in the constructor: auth may not
    // be complete yet. Instead, store the entire Security object.
    public function __construct(
        private Security $security,
    ){
    }

    public function logUser(): void
    {
        // returns User object or null if not authenticated
        $user = $this->security->getUser();

        
    }
}
?>