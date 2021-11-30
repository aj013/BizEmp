<?php

namespace App\Entity;

use App\Repository\EmployeesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeesRepository::class)
 */
class Employees
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EmpName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EmpAddress;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $EmpCreatedDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $EmpUpdateDate;

    /**
     * @ORM\ManyToOne(targetEntity=Deparment::class, inversedBy="DeptCode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $deparment;

    /**
     * @ORM\ManyToMany(targetEntity=Contacts::class, mappedBy="ContactNumber")
     */
    private $contacts;

    /**
     * @ORM\ManyToMany(targetEntity=Statuses::class, mappedBy="EmpStatus")
     */
    private $statuses;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->statuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpName(): ?string
    {
        return $this->EmpName;
    }

    public function setEmpName(string $EmpName): self
    {
        $this->EmpName = $EmpName;

        return $this;
    }

    public function getEmpAddress(): ?string
    {
        return $this->EmpAddress;
    }

    public function setEmpAddress(?string $EmpAddress): self
    {
        $this->EmpAddress = $EmpAddress;

        return $this;
    }

    public function getEmpCreatedDate(): ?\DateTimeInterface
    {
        return $this->EmpCreatedDate;
    }

    public function setEmpCreatedDate(?\DateTimeInterface $EmpCreatedDate): self
    {
        $this->EmpCreatedDate = $EmpCreatedDate;

        return $this;
    }

    public function getEmpUpdateDate(): ?\DateTimeInterface
    {
        return $this->EmpUpdateDate;
    }

    public function setEmpUpdateDate(\DateTimeInterface $EmpUpdateDate): self
    {
        $this->EmpUpdateDate = $EmpUpdateDate;

        return $this;
    }

    public function getDeparment(): ?Deparment
    {
        return $this->deparment;
    }

    public function setDeparment(?Deparment $deparment): self
    {
        $this->deparment = $deparment;

        return $this;
    }

    /**
     * @return Collection|Contacts[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contacts $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->addContactNumber($this);
        }

        return $this;
    }

    public function removeContact(Contacts $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            $contact->removeContactNumber($this);
        }

        return $this;
    }

    /**
     * @return Collection|Statuses[]
     */
    public function getStatuses(): Collection
    {
        return $this->statuses;
    }

    public function addStatus(Statuses $status): self
    {
        if (!$this->statuses->contains($status)) {
            $this->statuses[] = $status;
            $status->addEmpStatus($this);
        }

        return $this;
    }

    public function removeStatus(Statuses $status): self
    {
        if ($this->statuses->removeElement($status)) {
            $status->removeEmpStatus($this);
        }

        return $this;
    }
}
