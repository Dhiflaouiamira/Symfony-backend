<?php

namespace App\Entity;

use App\Repository\TerrainRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TerrainRepository::class)
 */
class Terrain
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
    private $Maitrage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaitrage(): ?string
    {
        return $this->Maitrage;
    }

    public function setMaitrage(string $Maitrage): self
    {
        $this->Maitrage = $Maitrage;

        return $this;
    }
}
