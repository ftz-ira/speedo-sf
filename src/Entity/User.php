<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="pseudo_UNIQUE", columns={"pseudo"})}, indexes={@ORM\Index(name="fk_user_role1_idx", columns={"role_id"}), @ORM\Index(name="fk_user_status_idx", columns={"status_id"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Assert\NotBlank
     */
    private $id;

    /**
     * @ORM\Column(name="pseudo", type="string", length=45, nullable=false)
     *  @Assert\Type("text")
     */
    private $pseudo;

    /**
     * @ORM\Column(name="birthday", type="datetime", nullable=true)
     *  @Assert\DateTime
     */
    private $birthday;

    /**
     * @ORM\Column(name="created_date", type="datetime",  nullable=false)
     * @Assert\DateTime
     */
    private $createdDate;

    /**
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     * @Assert\Email( message = "l'email n'est pas valide")
     */
    private $email;

    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @Assert\Type("string")
     */
    private $password;

    /**
     * @ORM\Column(name="active", type="boolean", nullable=true)
     * @Assert\Type("bool")
     */
    private $active;

    /**
     * @ORM\Column(name="sponsorship_link", type="string", length=255, nullable=true)
     * @Assert\Type("string")
     *
     * @Assert\Type(type="App\Entity\SponsorshipLink")
     * @Assert\Valid
     */
    private $sponsorshipLink;

    /**
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     * @Assert\Type(type="App\Entity\Role")
     * @Assert\Valid
     */
    private $role;

    /**
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     * @Assert\Type(type="App\Entity\Status")
     * @Assert\Valid
     *
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(?\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getSponsorshipLink(): ?string
    {
        return $this->sponsorshipLink;
    }

    public function setSponsorshipLink(?string $sponsorshipLink): self
    {
        $this->sponsorshipLink = $sponsorshipLink;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }


}
