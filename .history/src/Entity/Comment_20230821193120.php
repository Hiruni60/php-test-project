<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $cmtName = null;

    #[ORM\Column(length: 255)]
    private ?string $cmtDes = null;

    #[ORM\Column]
    private ?int $blogId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCmtName(): ?string
    {
        return $this->cmtName;
    }

    public function setCmtName(string $cmtName): static
    {
        $this->cmtName = $cmtName;

        return $this;
    }

    public function getCmtDes(): ?string
    {
        return $this->cmtDes;
    }

    public function setCmtDes(string $cmtDes): static
    {
        $this->cmtDes = $cmtDes;

        return $this;
    }

    public function getBlogId(): ?int
    {
        return $this->blogId;
    }

    public function setBlogId(int $blogId): static
    {
        $this->blogId = $blogId;

        return $this;
    }
}
