<?php 
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

  
    class UserController extends AbstractController{

        #[Route('/user/myBlogs', name: 'user_blogs')]
        public function userBlogDashboard(): Response{
            $logUser = $this->getUser();
            $repository = $this->entityManager->getRepository(Blog::class);
            $blogPost = $repository->find($id);
    
            
            $comments = $blogPost->getComments();
    
            return $this->render('blogs/view.html.twig', ['blogPost' => $blogPost,'comments' => $comments]);
            
            return $this->render('User/userBlog.html.twig');
        }

    }


?>