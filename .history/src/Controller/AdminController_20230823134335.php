<?php 
    use Symfony\Component\Security\Http\Attribute\IsGranted;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;

    #[IsGranted('ROLE_ADMIN')]
    class AdminController extends AbstractController
    {
        // Optionally, you can set a custom message that will be displayed to the user
        #[IsGranted('ROLE_SUPER_ADMIN', message: 'You are not allowed to access the admin dashboard.')]
        public function adminDashboard(): Response
        {
            // ...
        }
    }
?>