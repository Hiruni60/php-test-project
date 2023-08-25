<?php  
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Comment;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

use function Symfony\Component\Clock\now;


class CommentController extends AbstractController
{

    private $entityManager; // Add a private property to hold the EntityManager

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // #[Route('/blogs', name: 'blog_list')]
    // public function list(): Response
    // {
    //     return $this->render('blogs/blog.html.twig', [
            
    //     ]);
    // }

   /**
     * @Route("/blog/create", name="blog_create")
     */
    #[Route('/blog/addComment', name: 'comment_create')]
    public function createAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $cmtName = $request->request->get('cmtName');
            $cmtDes = $request->request->get('content');

            // Perform validation and save the blog post to the database
            $entityManager = $this->entityManager;

            $blogPost = new Blog();
            $blogPost->setTitle($title);
            $blogPost = new Blog();
            $blogPost->setTitle($title);
            $blogPost->setContent($content);
            $blogPost->setCreatedAt(new DateTime('now'));
            $entityManager->persist($blogPost);
            $entityManager->flush();

            return $this->redirectToRoute('blog_list');
        }

        return $this->render('blogs/create.html.twig');
    }

    /**
     * @Route("/blog", name="blog_list")
     */
    
    #[Route('/blog', name: 'blog_list')]
    public function listAction()
    {
        // $blogPosts = [];
        $repository = $this->entityManager->getRepository(Blog::class);
        $blogPosts = $repository->findAll();

        return $this->render('blogs/list.html.twig', ['blogPosts' => $blogPosts]);
    }

    /**
     * @Route("/blog/{id}", name="blog_view")
     */
    #[Route('/blog/{id}', name: 'blog_view')]





}

?>