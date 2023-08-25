<?php
namespace App\Controller;

use App\Entity\Task;
use App\Form\Type\Blo;
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

    // public function new(Request $request): Response
    // {
    //     // creates a task object and initializes some data for this example
    //     $task = new Task();
    //     $task->setBlogTitle('Write a blog name');
    //     $task->setBlogDescription('Write a blog description');
    //     $task->setAuthorName('Write a author name');
       

    //     $form = $this->createFormBuilder($task)
    //         ->add('blogTitle', TextType::class)
    //         ->add('blogDescription', TextType::class)
    //         ->add('authorName', TextType::class)
    //         ->add('save', SubmitType::class, ['label' => 'Create Task'])
    //         ->getForm();

    //     // ...
    // }


    
}
?>