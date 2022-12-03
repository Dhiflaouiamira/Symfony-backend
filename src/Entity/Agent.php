<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentRepository::class)
 */
class Agent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $UserName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $PassWord;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="yes")
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity=BienImmobilier::class, mappedBy="Agent")
     */
    private $no;

    /**
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="Agent")
     */
    private $clear;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->no = new ArrayCollection();
        $this->clear = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->UserName;
    }

    public function setUserName(string $UserName): self
    {
        $this->UserName = $UserName;

        return $this;
    }

    public function getPassWord(): ?string
    {
        return $this->PassWord;
    }

    public function setPassWord(string $PassWord): self
    {
        $this->PassWord = $PassWord;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setYes($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getYes() === $this) {
                $reservation->setYes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BienImmobilier>
     */
    public function getNo(): Collection
    {
        return $this->no;
    }

    public function addNo(BienImmobilier $no): self
    {
        if (!$this->no->contains($no)) {
            $this->no[] = $no;
            $no->setAgent($this);
        }

        return $this;
    }

    public function removeNo(BienImmobilier $no): self
    {
        if ($this->no->removeElement($no)) {
            // set the owning side to null (unless already changed)
            if ($no->getAgent() === $this) {
                $no->setAgent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getClear(): Collection
    {
        return $this->clear;
    }

    public function addClear(Reclamation $clear): self
    {
        if (!$this->clear->contains($clear)) {
            $this->clear[] = $clear;
            $clear->setAgent($this);
        }

        return $this;
    }

    public function removeClear(Reclamation $clear): self
    {
        if ($this->clear->removeElement($clear)) {
            // set the owning side to null (unless already changed)
            if ($clear->getAgent() === $this) {
                $clear->setAgent(null);
            }
        }

        return $this;
    }
}
