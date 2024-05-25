<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteRepository::class)]
class Site
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $misAjour = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $owner = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $likes = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'siteId')]
    private Collection $users;

    /**
     * @var Collection<int, FProperty>
     */
    #[ORM\OneToMany(targetEntity: FProperty::class, mappedBy: 'siteId')]
    private Collection $fProperties;

    /**
     * @var Collection<int, FIcon>
     */
    #[ORM\OneToMany(targetEntity: FIcon::class, mappedBy: 'siteId')]
    private Collection $fIcons;

    /**
     * @var Collection<int, Style>
     */
    #[ORM\OneToMany(targetEntity: Style::class, mappedBy: 'siteId')]
    private Collection $styles;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->fProperties = new ArrayCollection();
        $this->fIcons = new ArrayCollection();
        $this->styles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getMisAjour(): ?string
    {
        return $this->misAjour;
    }

    public function setMisAjour(?string $misAjour): static
    {
        $this->misAjour = $misAjour;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(?string $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getLikes(): ?string
    {
        return $this->likes;
    }

    public function setLikes(?string $likes): static
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setSiteId($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getSiteId() === $this) {
                $user->setSiteId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FProperty>
     */
    public function getFProperties(): Collection
    {
        return $this->fProperties;
    }

    public function addFProperty(FProperty $fProperty): static
    {
        if (!$this->fProperties->contains($fProperty)) {
            $this->fProperties->add($fProperty);
            $fProperty->setSiteId($this);
        }

        return $this;
    }

    public function removeFProperty(FProperty $fProperty): static
    {
        if ($this->fProperties->removeElement($fProperty)) {
            // set the owning side to null (unless already changed)
            if ($fProperty->getSiteId() === $this) {
                $fProperty->setSiteId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FIcon>
     */
    public function getFIcons(): Collection
    {
        return $this->fIcons;
    }

    public function addFIcon(FIcon $fIcon): static
    {
        if (!$this->fIcons->contains($fIcon)) {
            $this->fIcons->add($fIcon);
            $fIcon->setSiteId($this);
        }

        return $this;
    }

    public function removeFIcon(FIcon $fIcon): static
    {
        if ($this->fIcons->removeElement($fIcon)) {
            // set the owning side to null (unless already changed)
            if ($fIcon->getSiteId() === $this) {
                $fIcon->setSiteId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Style>
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(Style $style): static
    {
        if (!$this->styles->contains($style)) {
            $this->styles->add($style);
            $style->setSiteId($this);
        }

        return $this;
    }

    public function removeStyle(Style $style): static
    {
        if ($this->styles->removeElement($style)) {
            // set the owning side to null (unless already changed)
            if ($style->getSiteId() === $this) {
                $style->setSiteId(null);
            }
        }

        return $this;
    }
}
