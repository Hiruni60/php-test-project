<?php
namespace App\Controller;

use App\Entity\Task;
use App\Form\Type\BlogDetails;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class BlogController extends AbstractController
{
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
            $entityManager = $this->getDoctrine()->getManager();

            $blogPost = new Blog();
            $blogPost->setTitle($title);
            


    
}
?>