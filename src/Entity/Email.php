<?php

namespace App\Entity;

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

}
