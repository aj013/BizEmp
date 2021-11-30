<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactsRepository::class)
 */
class Contacts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Employees::class, inversedBy="contacts")
     */
    private $ContactNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ContactProvider;

    public function __construct()
    {
        $this->ContactNumber = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Employees[]
     */
    public function getContactNumber(): Collection
    {
        return $this->ContactNumber;
    }

    public function addContactNumber(Employees $contactNumber): self
    {
        if (!$this->ContactNumber->contains($contactNumber)) {
            $this->ContactNumber[] = $contactNumber;
        }

        return $this;
    }

    public function removeContactNumber(Employees $contactNumber): self
    {
        $this->ContactNumber->removeElement($contactNumber);

        return $this;
    }

    public function getContactProvider(): ?string
    {
        return $this->ContactProvider;
    }

    public function setContactProvider(?string $ContactProvider): self
    {
        $this->ContactProvider = $ContactProvider;

        return $this;
    }
}
