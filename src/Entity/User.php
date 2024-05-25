<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fullName = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $age = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $badge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneEmail = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?site $siteId = null;

    /**
     * @var Collection<int, Element>
     */
    #[ORM\OneToMany(targetEntity: Element::class, mappedBy: 'userId')]
    private Collection $elements;

    /**
     * @var Collection<int, Booking>
     */
    #[ORM\OneToMany(targetEntity: Booking::class, mappedBy: 'userId')]
    private Collection $bookings;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'userId')]
    private Collection $messages;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'receiverId')]
    private Collection $receivers;

    public function __construct()
    {
        $this->elements = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->receivers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(?string $imgUrl): static
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    public function setBadge(?string $badge): static
    {
        $this->badge = $badge;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getPhoneEmail(): ?string
    {
        return $this->phoneEmail;
    }

    public function setPhoneEmail(?string $phoneEmail): static
    {
        $this->phoneEmail = $phoneEmail;

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

    /**
     * @return Collection<int, Element>
     */
    public function getElements(): Collection
    {
        return $this->elements;
    }

    public function addElement(Element $element): static
    {
        if (!$this->elements->contains($element)) {
            $this->elements->add($element);
            $element->setUserId($this);
        }

        return $this;
    }

    public function removeElement(Element $element): static
    {
        if ($this->elements->removeElement($element)) {
            // set the owning side to null (unless already changed)
            if ($element->getUserId() === $this) {
                $element->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): static
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings->add($booking);
            $booking->setUserId($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): static
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getUserId() === $this) {
                $booking->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setUserId($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getUserId() === $this) {
                $message->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getReceivers(): Collection
    {
        return $this->receivers;
    }

    public function addReceiver(Message $receiver): static
    {
        if (!$this->receivers->contains($receiver)) {
            $this->receivers->add($receiver);
            $receiver->setReceiverId($this);
        }

        return $this;
    }

    public function removeReceiver(Message $receiver): static
    {
        if ($this->receivers->removeElement($receiver)) {
            // set the owning side to null (unless already changed)
            if ($receiver->getReceiverId() === $this) {
                $receiver->setReceiverId(null);
            }
        }

        return $this;
    }
}
