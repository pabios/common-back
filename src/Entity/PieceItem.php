<?php

namespace App\Entity;

use App\Repository\PieceItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PieceItemRepository::class)]
class PieceItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'pieceId')]
    private ?piece $pieceId = null;

    #[ORM\ManyToOne(inversedBy: 'pieceItems')]
    private ?item $itemId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(?string $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPieceId(): ?piece
    {
        return $this->pieceId;
    }

    public function setPieceId(?piece $pieceId): static
    {
        $this->pieceId = $pieceId;

        return $this;
    }

    public function getItemId(): ?item
    {
        return $this->itemId;
    }

    public function setItemId(?item $itemId): static
    {
        $this->itemId = $itemId;

        return $this;
    }
}
