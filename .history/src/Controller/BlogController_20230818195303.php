<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;


class BlogController extends AbstractController
{

    private $entityManager; // Add a private property to hold the EntityManager

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/blogs', name: 'blog_list')]
    public function list(): Response
    {
        return $this->render('blogs/blog.html.twig', [
            
        ]);
    }

   /**
     * @Route("/blog/create", name="blog_create")
     */
    public function createAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $title = $request->request->get('title');
            $content = $request->request->get('content');

            // Perform validation and save the blog post to the database
            $entityManager = $this->entityManager;

            $blogPost = new Blog();
            $blogPost->setTitle($title);
            $blogPost = new Blog();
            $blogPost->setTitle($title);
            $blogPost->setContent($content);

            $entityManager->persist($blogPost);
            $entityManager->flush();

            return $this->redirectToRoute('blog_list');
        }

        return $this->render('blog/create.html.twig');
    }

    /**
     * @Route("/blog", name="blog_list")
     */
    public function listAction()
    {
        $repository = $this->entityManager->getRepository(Blog::class);
        $blogPosts = $repository->findAll();

        return $this->render('blog/list.html.twig', ['blogPosts' => $blogPosts]);
    }

    /**
     * @Route("/blog/{id}", name="blog_view")
     */
    public function viewAction($id)
    {
        $repository = $this->entityManager->getRepository(Blog::class);
        $blogPost = $repository->find($id);

        return $this->render('blog/view.html.twig', ['blogPost' => $blogPost]);
    }

    /**
     * @Route("/blog/{id}/edit", name="blog_edit")
     */
    public function editAction($id)
    {
        $repository = $this->entityManager->getRepository(Blog::class);
        $blogPost = $repository->find($id);

        return $this->render('blog/edit.html.twig', ['blogPost' => $blogPost]);
    }

    /**
     * @Route("/blog/{id}/update", name="blog_update")
     */
    public function updateAction(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Blog::class);
        $blogPost = $repository->find($id);

        if ($request->isMethod('POST')) {
            $title = $request->request->get('title');
            $content = $request->request->get('content');
// Update and save changes
            $blogPost->setTitle($title);
            $blogPost->setContent($content);
            $entityManager->flush();

            return $this->redirectToRoute('blog_list');
        }

        return $this->render('blog/edit.html.twig', ['blogPost' => $blogPost]);
    }

    /**
     * @Route("/blog/{id}/delete", name="blog_delete")
     */
    public function deleteAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Blog::class);
        $blogPost = $repository->find($id);
// Remove and save changes
        $entityManager->remove($blogPost);
        $entityManager->flush();

        return $this->redirectToRoute('blog_list');
    }



    
}
?>