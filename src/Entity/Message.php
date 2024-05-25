<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?user $userId = null;

    #[ORM\ManyToOne(inversedBy: 'receivers')]
    private ?user $receiverId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->userId;
    }

    public function setUserId(?user $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getReceiverId(): ?user
    {
        return $this->receiverId;
    }

    public function setReceiverId(?user $receiverId): static
    {
        $this->receiverId = $receiverId;

        return $this;
    }
}
