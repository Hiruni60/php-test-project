<?php  
    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    class BlogDetailController extends AbstractController
{
    #[Route('/blog/1/{slug}', name: 'blogs_1')]
    public function detail_1(string $slug): Response
    {
        return $this->render('blogs/blogDetails.html.twig', [
            
        ]);
    }

    #[Route('/blog/2', name: 'blogs_2')]
    public function detail_2(): Response
    {
        return $this->render('blogs/blogDetails_1.html.twig', [
            
        ]);
    }

    #[Route('/blog/3', name: 'blogs_3')]
    public function detail_3(): Response
    {
        return $this->render('blogs/blog', [
            
        ]);
    }

    #[Route('/blog/add', name: 'blogs_add')]
    public function detail_add(): Response
    {
        return $this->render('blogs/addBlogs.html.twig', [
            
        ]);
    }

    #[Route('/blog/edit', name: 'blogs_edit')]
    public function detail_edit(): Response
    {
        return $this->render('blogs/editBlogs.html.twig', [
            
        ]);
    }
}




?>