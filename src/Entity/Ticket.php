<?php

namespace App\Entity;

use App\Entity\Traits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    use Traits\SoftDeletedTrait;
    use Traits\TimestampableTrait;
    use Traits\SortablePositionTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $note;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tag", inversedBy="tickets")
     */
    private $id_tag;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\State", inversedBy="tickets")
     */
    private $id_state;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tickets")
     */
    private $id_author;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="tickets")
     */
    private $id_team_assign;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="id_ticket")
     */
    private $comments;

    /**
     * Ticket constructor.
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Ticket
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return Ticket
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Ticket
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNote(): ?int
    {
        return $this->note;
    }

    /**
     * @param int $note
     * @return Ticket
     */
    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     * @return Ticket
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return Tag|null
     */
    public function getIdTag(): ?Tag
    {
        return $this->id_tag;
    }

    /**
     * @param Tag|null $id_tag
     * @return Ticket
     */
    public function setIdTag(?Tag $id_tag): self
    {
        $this->id_tag = $id_tag;

        return $this;
    }

    /**
     * @return State|null
     */
    public function getIdState(): ?State
    {
        return $this->id_state;
    }

    /**
     * @param State|null $id_state
     * @return Ticket
     */
    public function setIdState(?State $id_state): self
    {
        $this->id_state = $id_state;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getIdAuthor(): ?User
    {
        return $this->id_author;
    }

    /**
     * @param User|null $id_author
     * @return Ticket
     */
    public function setIdAuthor(?User $id_author): self
    {
        $this->id_author = $id_author;

        return $this;
    }

    /**
     * @return Team|null
     */
    public function getIdTeamAssign(): ?Team
    {
        return $this->id_team_assign;
    }

    /**
     * @param Team|null $id_team_assign
     * @return Ticket
     */
    public function setIdTeamAssign(?Team $id_team_assign): self
    {
        $this->id_team_assign = $id_team_assign;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * @param Comment $comment
     * @return Ticket
     */
    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setIdTicket($this);
        }

        return $this;
    }

    /**
     * @param Comment $comment
     * @return Ticket
     */
    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getIdTicket() === $this) {
                $comment->setIdTicket(null);
            }
        }

        return $this;
    }
}
