<?php

namespace App\Entity;

use App\Repository\PieceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PieceRepository::class)]
class Piece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surface = null;

    #[ORM\ManyToOne(inversedBy: 'pieces')]
    private ?element $elementId = null;

    /**
     * @var Collection<int, PieceItem>
     */
    #[ORM\OneToMany(targetEntity: PieceItem::class, mappedBy: 'pieceId')]
    private Collection $pieceId;

    public function __construct()
    {
        $this->pieceId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function setSurface(?string $surface): static
    {
        $this->surface = $surface;

        return $this;
    }

    public function getElementId(): ?element
    {
        return $this->elementId;
    }

    public function setElementId(?element $elementId): static
    {
        $this->elementId = $elementId;

        return $this;
    }

    /**
     * @return Collection<int, PieceItem>
     */
    public function getPieceId(): Collection
    {
        return $this->pieceId;
    }

    public function addItemId(PieceItem $itemId): static
    {
        if (!$this->pieceId->contains($itemId)) {
            $this->pieceId->add($itemId);
            $itemId->setPieceId($this);
        }

        return $this;
    }

    public function removeItemId(PieceItem $itemId): static
    {
        if ($this->pieceId->removeElement($itemId)) {
            // set the owning side to null (unless already changed)
            if ($itemId->getPieceId() === $this) {
                $itemId->setPieceId(null);
            }
        }

        return $this;
    }
}
