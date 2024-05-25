<?php

namespace App\Entity;

use App\Repository\FPropertyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FPropertyRepository::class)]
class FProperty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $propertyPrimary = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $propertySecondary = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $propertyTertiary = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $propertyQuatermary = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $spec = null;

    #[ORM\ManyToOne(inversedBy: 'fProperties')]
    private ?site $siteId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPropertyPrimary(): ?string
    {
        return $this->propertyPrimary;
    }

    public function setPropertyPrimary(?string $propertyPrimary): static
    {
        $this->propertyPrimary = $propertyPrimary;

        return $this;
    }

    public function getPropertySecondary(): ?string
    {
        return $this->propertySecondary;
    }

    public function setPropertySecondary(?string $propertySecondary): static
    {
        $this->propertySecondary = $propertySecondary;

        return $this;
    }

    public function getPropertyTertiary(): ?string
    {
        return $this->propertyTertiary;
    }

    public function setPropertyTertiary(?string $propertyTertiary): static
    {
        $this->propertyTertiary = $propertyTertiary;

        return $this;
    }

    public function getPropertyQuatermary(): ?string
    {
        return $this->propertyQuatermary;
    }

    public function setPropertyQuatermary(?string $propertyQuatermary): static
    {
        $this->propertyQuatermary = $propertyQuatermary;

        return $this;
    }

    public function getSpec(): ?string
    {
        return $this->spec;
    }

    public function setSpec(?string $spec): static
    {
        $this->spec = $spec;

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
