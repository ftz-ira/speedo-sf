<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypePayment
 *
 * @ORM\Table(name="type_payment")
 * @ORM\Entity
 */
class TypePayment
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
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_date", type="string", length=45, nullable=true)
     */
    private $updateDate;


}
