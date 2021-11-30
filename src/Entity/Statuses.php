<?php

namespace App\Entity;

use App\Repository\StatusesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatusesRepository::class)
 */
class Statuses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Employees::class, inversedBy="statuses")
     */
    private $EmpStatus;

    public function __construct()
    {
        $this->EmpStatus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Employees[]
     */
    public function getEmpStatus(): Collection
    {
        return $this->EmpStatus;
    }

    public function addEmpStatus(Employees $empStatus): self
    {
        if (!$this->EmpStatus->contains($empStatus)) {
            $this->EmpStatus[] = $empStatus;
        }

        return $this;
    }

    public function removeEmpStatus(Employees $empStatus): self
    {
        $this->EmpStatus->removeElement($empStatus);

        return $this;
    }
}
