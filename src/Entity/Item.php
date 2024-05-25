<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $space = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    /**
     * @var Collection<int, PieceItem>
     */
    #[ORM\OneToMany(targetEntity: PieceItem::class, mappedBy: 'itemId')]
    private Collection $pieceItems;

    public function __construct()
    {
        $this->pieceItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpace(): ?string
    {
        return $this->space;
    }

    public function setSpace(?string $space): static
    {
        $this->space = $space;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, PieceItem>
     */
    public function getPieceItems(): Collection
    {
        return $this->pieceItems;
    }

    public function addPieceItem(PieceItem $pieceItem): static
    {
        if (!$this->pieceItems->contains($pieceItem)) {
            $this->pieceItems->add($pieceItem);
            $pieceItem->setItemId($this);
        }

        return $this;
    }

    public function removePieceItem(PieceItem $pieceItem): static
    {
        if ($this->pieceItems->removeElement($pieceItem)) {
            // set the owning side to null (unless already changed)
            if ($pieceItem->getItemId() === $this) {
                $pieceItem->setItemId(null);
            }
        }

        return $this;
    }
}
