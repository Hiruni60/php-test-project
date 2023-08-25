<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $cmtId = null;

    #[ORM\Column(length: 45)]
    private ?string $cmtName = null;

    #[ORM\Column(length: 255)]
    private ?string $commentDesc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCmtId(): ?int
    {
        return $this->cmtId;
    }

    public function setCmtId(int $cmtId): static
    {
        $this->cmtId = $cmtId;

        return $this;
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

    public function getCommentDesc(): ?string
    {
        return $this->commentDesc;
    }

    public function setCommentDesc(string $commentDesc): static
    {
        $this->commentDesc = $commentDesc;

        return $this;
    }
}
