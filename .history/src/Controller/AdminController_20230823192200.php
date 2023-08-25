<?php 
    namespace App\Controller;

    use Symfony\Component\Security\Http\Attribute\IsGranted;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[IsGranted('ROLE_ADMIN', statusCode: 423))]
    class AdminController extends AbstractController
    {

        #[Route('/admin/dashboard', name: 'admin_dashboard')]
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