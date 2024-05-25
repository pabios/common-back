<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StyleRepository::class)]
class Style
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paragraphe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $primaryColor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secondaryColor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $police = null;

    #[ORM\ManyToOne(inversedBy: 'styles')]
    private ?site $siteId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): static
    {
        $this->titre = $titre;

        return $this;
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

    public function getParagraphe(): ?string
    {
        return $this->paragraphe;
    }

    public function setParagraphe(?string $paragraphe): static
    {
        $this->paragraphe = $paragraphe;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): static
    {
        $this->lien = $lien;

        return $this;
    }

    public function getPrimaryColor(): ?string
    {
        return $this->primaryColor;
    }

    public function setPrimaryColor(?string $primaryColor): static
    {
        $this->primaryColor = $primaryColor;

        return $this;
    }

    public function getSecondaryColor(): ?string
    {
        return $this->secondaryColor;
    }

    public function setSecondaryColor(?string $secondaryColor): static
    {
        $this->secondaryColor = $secondaryColor;

        return $this;
    }

    public function getPolice(): ?string
    {
        return $this->police;
    }

    public function setPolice(?string $police): static
    {
        $this->police = $police;

        return $this;
    }

    public function getSiteId(): ?site
    {
        return $this->siteId;
    }

    public function setSiteId(?site $siteId): static
    {
        $this->siteId = $siteId;

        return $this;
    }
}
