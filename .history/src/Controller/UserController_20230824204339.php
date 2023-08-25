<?php 
    namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

  
    class UserController extends AbstractController{

    private $entityManager; // Add a private property to hold the EntityManager

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

        #[Route('/user/myBlogs', name: 'user_blogs')]
        public function userBlogDashboard(): Response{
            $logUser = $this->getUser();
            $repository = $this->entityManager->getRepository(User::class);
            $user = $repository->find($logUser->$id);
    
            
            $comments = $blogPost->getComments();
    
            return $this->render('blogs/view.html.twig', ['use' => $blogPost,'comments' => $use]);

            return $this->render('User/userBlog.html.twig');
        }

    }


?>