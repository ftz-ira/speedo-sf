<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credit
 *
 * @ORM\Table(name="credit", indexes={@ORM\Index(name="fk_credit_type_payment1_idx", columns={"type_payment_id"}), @ORM\Index(name="fk_credit_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Credit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=true)
     */
    private $montant;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="solde_out", type="boolean", nullable=true)
     */
    private $soldeOut;

    /**
     * @var string|null
     *
     * @ORM\Column(name="paye_date", type="string", length=45, nullable=true)
     */
    private $payeDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_date", type="string", length=45, nullable=true)
     */
    private $updateDate;

    /**
     * @var \TypePayment
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="TypePayment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_payment_id", referencedColumnName="id")
     * })
     */
    private $typePayment;

    /**
     * @var \User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getSoldeOut(): ?bool
    {
        return $this->soldeOut;
    }

    public function setSoldeOut(?bool $soldeOut): self
    {
        $this->soldeOut = $soldeOut;

        return $this;
    }

    public function getPayeDate(): ?string
    {
        return $this->payeDate;
    }

    public function setPayeDate(?string $payeDate): self
    {
        $this->payeDate = $payeDate;

        return $this;
    }

    public function getUpdateDate(): ?string
    {
        return $this->updateDate;
    }

    public function setUpdateDate(?string $updateDate): self
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    public function getTypePayment(): ?TypePayment
    {
        return $this->typePayment;
    }

    public function setTypePayment(?TypePayment $typePayment): self
    {
        $this->typePayment = $typePayment;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
