<?php 
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[IsGranted('ROLE_U', statusCode: 404)]
    class UserController extends AbstractController{

        #[Route('/user/myBlogs', name: 'user_blogs')]
        public function userBlogDashboard(): Response{

            return $this->render('User/userBlog.html.twig');
        }

    }


?>