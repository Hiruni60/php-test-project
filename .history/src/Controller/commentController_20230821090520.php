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
            $cmtDes = $request->request->get('cmtDes');

            // Perform validation and save the blog post to the database
            $entityManager = $this->entityManager;

            $commentPost = new Comment();
            $commentPost->setCmtName($cmtName);
            $commentPost = new Comment();
            $commentPost->setCmtName($cmtName);
            $commentPost->setCmtDes($cmtDes);
            // $commentPost->setCreatedAt(new DateTime('now'));
            $entityManager->persist($commentPost);
            $entityManager->flush();

            return $this->redirectToRoute('comment_list');
        }

        return $this->render('blogs/create.html.twig');
    }

    /**
     * @Route("/blog", name="blog_list")
     */
    
    #[Route('/blog/addComment', name: 'comment_list')]
    public function listAction()
    {
        // $blogPosts = [];
        $repository = $this->entityManager->getRepository(Comment::class);
        $commentPosts = $repository->findAll();

        return $this->render('blogs/addComment.html.twig', ['commentPosts' => $commentPosts]);
    }

    /**
     * @Route("/blog/{id}", name="blog_view")
     */
    #[Route('/blog/addComment/{id}', name: 'comment_view')]
    public function viewAction($id)
    {
        // $blogPost =[];
        $repository = $this->entityManager->getRepository(Comment::class);
        $commentPost = $repository->find($id);

        return $this->render('blogs/addComment.html.twig', ['commentPost' => $commentPost]);
    }

    /**
     * @Route("/blog/{id}/edit", name="blog_edit")
     */
    #[Route('/blog/addComment/{id}/edit', name: 'comment_edit')]
    public function editAction($id)
    {
        // $blogPost =[];
        $repository = $this->entityManager->getRepository(Comment::class);
        $commentPost = $repository->find($id);

        return $this->render('blogs/editComment.html.twig', ['commentPost' => $commentPost]);
    }

    /**
     * @Route("/blog/{id}/update", name="blog_update")
     */
    #[Route('/blog/addComment/{id}/update', name: 'blog_update')]
    public function updateAction(Request $request, $id)
    {

        // $blogPost =[];
        $repository = $this->entityManager->getRepository(Comment::class);
        $commentPost = $repository->find($id);
if ($request->isMethod('POST')) {
            $cmtName = $request->request->get('cmtName');
            $cmtDes = $request->request->get('cmtDes');

            // Update and save changes
            $commentPost->setCmtName($cmtName);
            $commentPost->setC($content);
            $this->entityManager->flush();

            return $this->redirectToRoute('blog_list');
        }
        return $this->render('blogs/editComment.html.twig', ['commentPost' => $commentPost]);
    }

    /**
     * @Route("/blog/{id}/delete", name="blog_delete")
     */
    #[Route('/blog/{id}/delete', name: 'blog_delete')]
    public function deleteAction($id)
    {
        $repository = $this->entityManager->getRepository(Blog::class);
        $blogPost = $repository->find($id);

        // // Remove and save changes
        $this->entityManager->remove($blogPost);
        $this->entityManager->flush();

        return $this->redirectToRoute('blog_list');
    }





}

?>