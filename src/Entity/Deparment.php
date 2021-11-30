<?php

namespace App\Entity;

use App\Repository\DeparmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeparmentRepository::class)
 */
class Deparment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Employees::class, mappedBy="deparment")
     */
    private $DeptCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $DeptName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DeptCreatedDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DeptUpdateDate;

    public function __construct()
    {
        $this->DeptCode = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Employees[]
     */
    public function getDeptCode(): Collection
    {
        return $this->DeptCode;
    }

    public function addDeptCode(Employees $deptCode): self
    {
        if (!$this->DeptCode->contains($deptCode)) {
            $this->DeptCode[] = $deptCode;
            $deptCode->setDeparment($this);
        }

        return $this;
    }

    public function removeDeptCode(Employees $deptCode): self
    {
        if ($this->DeptCode->removeElement($deptCode)) {
            // set the owning side to null (unless already changed)
            if ($deptCode->getDeparment() === $this) {
                $deptCode->setDeparment(null);
            }
        }

        return $this;
    }

    public function getDeptName(): ?string
    {
        return $this->DeptName;
    }

    public function setDeptName(?string $DeptName): self
    {
        $this->DeptName = $DeptName;

        return $this;
    }

    public function getDeptCreatedDate(): ?\DateTimeInterface
    {
        return $this->DeptCreatedDate;
    }

    public function setDeptCreatedDate(?\DateTimeInterface $DeptCreatedDate): self
    {
        $this->DeptCreatedDate = $DeptCreatedDate;

        return $this;
    }

    public function getDeptUpdateDate(): ?\DateTimeInterface
    {
        return $this->DeptUpdateDate;
    }

    public function setDeptUpdateDate(?\DateTimeInterface $DeptUpdateDate): self
    {
        $this->DeptUpdateDate = $DeptUpdateDate;

        return $this;
    }
}
