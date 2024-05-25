<?php

namespace App\Entity;

use App\Repository\FIconRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FIconRepository::class)]
class FIcon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $iconPrimary = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $iconSecondary = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $iconTertiary = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $iconQuatermary = null;

    #[ORM\ManyToOne(inversedBy: 'fIcons')]
    private ?site $siteId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIconPrimary(): ?string
    {
        return $this->iconPrimary;
    }

    public function setIconPrimary(?string $iconPrimary): static
    {
        $this->iconPrimary = $iconPrimary;

        return $this;
    }

    public function getIconSecondary(): ?string
    {
        return $this->iconSecondary;
    }

    public function setIconSecondary(?string $iconSecondary): static
    {
        $this->iconSecondary = $iconSecondary;

        return $this;
    }

    public function getIconTertiary(): ?string
    {
        return $this->iconTertiary;
    }

    public function setIconTertiary(?string $iconTertiary): static
    {
        $this->iconTertiary = $iconTertiary;

        return $this;
    }

    public function getIconQuatermary(): ?string
    {
        return $this->iconQuatermary;
    }

    public function setIconQuatermary(?string $iconQuatermary): static
    {
        $this->iconQuatermary = $iconQuatermary;

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
