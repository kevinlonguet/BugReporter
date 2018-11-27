<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

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

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdTag(): ?Tag
    {
        return $this->id_tag;
    }

    public function setIdTag(?Tag $id_tag): self
    {
        $this->id_tag = $id_tag;

        return $this;
    }

    public function getIdState(): ?State
    {
        return $this->id_state;
    }

    public function setIdState(?State $id_state): self
    {
        $this->id_state = $id_state;

        return $this;
    }

    public function getIdAuthor(): ?User
    {
        return $this->id_author;
    }

    public function setIdAuthor(?User $id_author): self
    {
        $this->id_author = $id_author;

        return $this;
    }

    public function getIdTeamAssign(): ?Team
    {
        return $this->id_team_assign;
    }

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

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setIdTicket($this);
        }

        return $this;
    }

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
