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

   
    #[Route('/blog/{id}/addComment', name: 'comment_create')]
    public function createAction(Request $request,$id)
    {
        if ($request->isMethod('POST')) {

            $logUser = $this->getUser();

            $cmtName = $request->request->get('cmtName');
            $cmtDes = $request->request->get('cmtDes');
            $blogId = $id;

            // Perform validation and save the blog post to the database
            $entityManager = $this->entityManager;

            // $commentPost = new Comment();
            // $commentPost->setCmtName($cmtName);
            $commentPost = new Comment();
            $commentPost->setCmtName($cmtName);
            $commentPost->setCmtDes($cmtDes);
            $commentPost->setBlogId($blogId);
            $commentPost->setUser($logUser);
            // $commentPost->setCreatedAt(new DateTime('now'));

            $commentPost->setBlog($category);

            $entityManager->persist($commentPost);
            $entityManager->flush();

            return $this->redirectToRoute('blog_view',['id' => $id]);
        }

        return $this->render('blogs/addComment.html.twig',['blogId' => $id]);
    }

    /**
     * @Route("/blog", name="blog_list")
     */
    
    #[Route('/blog/addComment/', name: 'comment_list')]
    public function listAction()
    {
        // $blogPosts = [];
        $repository = $this->entityManager->getRepository(Comment::class);
        $commentPost = $repository->findAll();

        return $this->render('blogs/addComment.html.twig', ['commentPost' => $commentPost]);
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
    #[Route('/blog/addComment/{id}/update', name: 'comment_update')]
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
            $commentPost->setCmtDes($cmtDes);
            $this->entityManager->flush();

            return $this->redirectToRoute('comment_list');
        }
        return $this->render('blogs/editComment.html.twig', ['commentPost' => $commentPost]);
    }

    /**
     * @Route("/blog/{id}/delete", name="blog_delete")
     */
    #[Route('/blog/addComment/{id}/delete', name: 'comment_delete')]
    public function deleteAction($id)
    {
        $repository = $this->entityManager->getRepository(Comment::class);
        $commentPost = $repository->find($id);

        // // Remove and save changes
        $this->entityManager->remove($commentPost);
        $this->entityManager->flush();

        return $this->redirectToRoute('comment_list');
    }





}

?>