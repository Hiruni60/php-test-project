<?php  
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BlogRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity(repositoryClass: BlogRepository::class)]

 
class Blog
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)] 
    private $id;

    #[ORM\Column(type: Types::STRING,length:25)]
    private $title;

    #[ORM\Column(type: Types::TEXT)]
    private $content;

    #[Column(name: 'created_at', type: Types::DATETIME_MUTABLE)]
    private $createdAt;
    // Getters and Setters for the properties

    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'blog')]
    private Collection $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

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

    public function getCommen(): Collection
    {
        return $this->products;
    }


}

?>