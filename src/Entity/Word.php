<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WordRepository")
 */
class Word
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text_representation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeric_representation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextRepresentation(): ?string
    {
        return $this->text_representation;
    }

    public function setTextRepresentation(string $text_representation): self
    {
        $this->text_representation = $text_representation;

        return $this;
    }

    public function getNumericRepresentation(): ?string
    {
        return $this->numeric_representation;
    }

    public function setNumericRepresentation(string $numeric_representation): self
    {
        $this->numeric_representation = $numeric_representation;

        return $this;
    }
}
