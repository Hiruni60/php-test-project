<?php 
    namespace App\Controller;

    use Symfony\Component\Security\Http\Attribute\IsGranted;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;

     #[IsGranted('ROLE_ADMIN')]
    
    class AdminController extends AbstractController
    {
        // Optionally, you can set a custom message that will be displayed to the user
        #[IsGranted('ROLE_ADMIN', message: 'You are not allowed to access the admin dashboard.')]
        public function adminDashboard(): Response
        {
            $hasAccess = $this->isGranted('ROLE_ADMIN');

            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
       
            return $this->render('Admin/adminDashboard.html.twig');
        }

    }
?>