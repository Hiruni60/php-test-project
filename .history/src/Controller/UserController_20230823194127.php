<?php 
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;


    class UserController extends AbstractController{

        #[Route('/admin/dashboard', name: 'admin_dashboard')]
        public function userBlogDashboard(): Response{

            return $this->render('User/userBlog.html.twig');
        }

    }


?>