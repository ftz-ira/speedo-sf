<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CryptoRepository")
 */
class Crypto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Wallet", inversedBy="cryptos")
     */
    private $wallet;

    public function __construct()
    {
        $this->wallet = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return Collection|Wallet[]
     */
    public function getWallet(): Collection
    {
        return $this->wallet;
    }

    public function addWallet(Wallet $wallet): self
    {
        if (!$this->wallet->contains($wallet)) {
            $this->wallet[] = $wallet;
            $wallet->setCrypto($this);
        }

        return $this;
    }

    public function removeWallet(Wallet $wallet): self
    {
        if ($this->wallet->contains($wallet)) {
            $this->wallet->removeElement($wallet);
            // set the owning side to null (unless already changed)
            if ($wallet->getCrypto() === $this) {
                $wallet->setCrypto(null);
            }
        }

        return $this;
    }
}
