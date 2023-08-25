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

    #[Route('/blogs/submit', name: 'blog_submit')]
   public function createAction(Request $request)
{
    if ($request->isMethod('POST')) {
        $title = $request->request->get('title');
        $description = $request->request->get('description');
        $ = $request->request->get('');

        // Perform validation and save the blog post to the database
        // ...

        return $this->redirectToRoute('blog_list');
    }

    return $this->render('blog/create.html.twig');
}


    
}
?>