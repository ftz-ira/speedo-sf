<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity
 */
class Email
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="banners", type="string", length=45, nullable=true)
     */
    private $banners;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="send", type="boolean", nullable=true)
     */
    private $send;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subject", type="string", length=45, nullable=true)
     */
    private $subject;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Banner", mappedBy="email")
     */
    private $banner;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->banner = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBanners(): ?string
    {
        return $this->banners;
    }

    public function setBanners(?string $banners): self
    {
        $this->banners = $banners;

        return $this;
    }

    public function getSend(): ?bool
    {
        return $this->send;
    }

    public function setSend(?bool $send): self
    {
        $this->send = $send;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

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

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return Collection|Banner[]
     */
    public function getBanner(): Collection
    {
        return $this->banner;
    }

    public function addBanner(Banner $banner): self
    {
        if (!$this->banner->contains($banner)) {
            $this->banner[] = $banner;
            $banner->addEmail($this);
        }

        return $this;
    }

    public function removeBanner(Banner $banner): self
    {
        if ($this->banner->contains($banner)) {
            $this->banner->removeElement($banner);
            $banner->removeEmail($this);
        }

        return $this;
    }

}
