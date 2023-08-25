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
            $entityManager = $this->Rasith Tranz
            19:12
            {{ path('blog_create') }}
            Rasith Tranz
            19:17
            public function createAction(Request $request)
            {
                if ($request->isMethod('POST')) {
                    $title = $request->request->get('title');
                    $content = $request->request->get('content');
            
                    // Perform validation and save the blog post to the database
                    // ...
            
                    return $this->redirectToRoute('blog_list');
                }
            
                return $this->render('blog/create.html.twig');
            }
            Rasith Tranz
            19:20
            ======================
            blog_create:
                path: /blog/create
                controller: App\Controller\BlogController::createAction
            blog_list:
                path: /blog
                controller: App\Controller\BlogController::listAction
            blog_view:
                path: /blog/{id}
                controller: App\Controller\BlogController::viewAction
            blog_edit:
                path: /blog/{id}/edit
                controller: App\Controller\BlogController::editAction
            blog_update:
                path: /blog/{id}/update
                controller: App\Controller\BlogController::updateAction
            blog_delete:
                path: /blog/{id}/delete
                controller: App\Controller\BlogController::deleteAction
            Rasith Tranz
            19:22
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
            Rasith Tranz
            19:24
            $blogPost = new Blog();
                        $blogPost->setTitle($title);
                        $blogPost->setContent($content);
            
                        $entityManager->persist($blogPost);
                        $entityManager->flush();
            
                        return $this->redirectToRoute('blog_list');
                    }
            
                    return $this->render('blog/create.html.twig');
                }
            --------------------------
            /**
                 * @Route("/blog", name="blog_list")
                 */
                public function listAction()
                {
                    $repository = $this->getDoctrine()->getRepository(Blog::class);
                    $blogPosts = $repository->findAll();
            
                    return $this->render('blog/list.html.twig', ['blogPosts' => $blogPosts]);
                }
            /**
                 * @Route("/blog/{id}", name="blog_view")
                 */
                public function viewAction($id)
                {
                    $repository = $this->getDoctrine()->getRepository(Blog::class);
                    $blogPost = $repository->find($id);
            
                    return $this->render('blog/view.html.twig', ['blogPost' => $blogPost]);
                }
            Rasith Tranz
            19:26
            /**
                 * @Route("/blog/{id}/edit", name="blog_edit")
                 */
                public function editAction($id)
                {
                    $repository = $this->getDoctrine()->getRepository(Blog::class);
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
            Rasith Tranz
            19:27
            -------------------------
            -------------------------
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
            Rasith Tranz
            19:28
            ========================================
            namespace App\Controller;
            
            use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
            use Symfony\Component\HttpFoundation\Request;
            use Symfony\Component\Routing\Annotation\Route;
            use App\Entity\Blog;
            Rasith Tranz
            19:30
            ================
            namespace App\Entity;
            
            use Doctrine\ORM\Mapping as ORM;
            /**
             * @ORM\Entity(repositoryClass="App\Repository\BlogRepository")
             */
            class Blog
            {
            }
            Rasith Tranz
            19:31
            =============================
            /**
                 * @ORM\Id
                 * @ORM\GeneratedValue
                 * @ORM\Column(type="integer")
                 */
                private $id;
            
                /**
                 * @ORM\Column(type="string", length=255)
                 */
                private $title;
            
                /**
                 * @ORM\Column(type="text")
                 */
                private $content;
            
                /**
                 * @ORM\Column(type="datetime")
                 */
                private $createdAt;
            // Getters and Setters for the properties
            
                public function getId(): ?int
                {
                    return $this->id;
                }
            
                public function getTitle(): ?string
                {
                    return $this->title;
                }
            public function setTitle(string $title): self
                {
                    $this->title = $title;
            
                    return $this;
                }
            
                public function getContent(): ?string
                {
                    return $this->content;
                }
            
                public function setContent(string $content): self
                {
                    $this->content = $content;
            
                    return $this;
                }
            public function getCreatedAt(): ?\DateTimeInterface
                {
                    return $this->createdAt;
                }
            
                public function setCreatedAt(\DateTimeInterface $createdAt): self
                {
                    $this->createdAt = $createdAt;
            
                    return $this;
                }
            Rasith Tranz
            19:33
            ==================
            create.html.twig
            Rasith Tranz
            19:34
            {% extends 'base.html.twig' %}
            
            {% block body %}
                <h1>Create New Blog Post</h1>
                
                <form action="{{ path('blog_create') }}" method="POST">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                    
                    <label for="content">Content:</label>
                    <textarea id="content" name="content" required></textarea>
                    
                    <button type="submit">Create Blog Post</button>
                </form>
                
                <a href="{{ path('blog_list') }}">Back to
            <a href="{{ path('blog_list') }}">Back to Blog List</a>
            {% endblock %}
            Rasith Tranz
            19:36
            =======================
            {% extends 'base.html.twig' %}
            
            {% block body %}
                <h1>Blog Posts</h1>
                
                <ul>
                    {% for post in blogPosts %}
                        <li>
                            <a href="{{ path('blog_view', { 'id': post.id }) }}">{{ post.title }}</a>
                        </li>
                    {% endfor %}
                </ul>
                
                <a href="{{ path('blog_create') }}">Create New Blog Post</a>
            {% endblock %}
            ==================
            view.html.twig
            ===============
            {% extends 'base.html.twig' %}
            
            {% block body %}
                <h1>{{ blogPost.title }}</h1>
                <p>{{ blogPost.content }}</p>
                
                <a href="{{ path('blog_edit', { 'id': blogPost.id }) }}">Edit</a>
                <a href="{{ path('blog_delete', { 'id': blogPost.id }) }}" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                <a href="{{ path('blog_list') }}">Back to Blog List</a>
            {% endblock %}
            ================
            Rasith Tranz
            19:38
            edit.html.twig
            =====================
            {% extends 'base.html.twig' %}
            
            {% block body %}
                <h1>Edit Blog Post</h1>
                
                <form action="{{ path('blog_update', { 'id': blogPost.id }) }}" method="POST">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="{{ blogPost.title }}" required>
                    
                    <label for="content">Content:</label>
                    <textarea id="content" name="content" required>{{ blogPost.content }}</textarea>
                    
                    <button type="submit">Update Blog Post</bu
            <button type="submit">Update Blog Post</button>
                </form>
                
                <a href="{{ path('blog_view', { 'id': blogPost.id }) }}">Cancel</a>
            {% endblock %}
            Rasith Tranz
            19:39
            =========================
            ========================
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>{% block title %}My Blog{% endblock %}</title>
                <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
                {# Additional CSS or script includes can be placed here #}
            </head>
            Rasith Tranz
            19:41
            <body>
                <header>
                    <h1><a href="{{ path('blog_list') }}">My Blog</a></h1>
                    <nav>
                        <ul>
                            <li><a href="{{ path('blog_list') }}">Home</a></li>
                            <li><a href="{{ path('blog_create') }}">Create Post</a></li>
                        </ul>
                    </nav>
                </header>
            <main>
                    {% block body %}{% endblock %}
                </main>
            
                <footer>
                    <p>&copy; {{ "now"|date("Y") }} My Blog</p>
                </footer>
            </body>
            </html>
            Rasith Tranz
            19:46
            use Doctrine\ORM\EntityManagerInterface;
            Rasith Tranz
            19:47
            private $entityManager; // Add a private property to hold the EntityManager
            
                public function __construct(EntityManagerInterface $entityManager)
                {
                    $this->entityManager = $entityManager;
                }
            Rasith Tranz
            19:48
            $this->entityManager;->getManager();

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
        $repository = $this->getDoctrine()->getRepository(Blog::class);
        $blogPosts = $repository->findAll();

        return $this->render('blog/list.html.twig', ['blogPosts' => $blogPosts]);
    }

    /**
     * @Route("/blog/{id}", name="blog_view")
     */
    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Blog::class);
        $blogPost = $repository->find($id);

        return $this->render('blog/view.html.twig', ['blogPost' => $blogPost]);
    }

    /**
     * @Route("/blog/{id}/edit", name="blog_edit")
     */
    public function editAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Blog::class);
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